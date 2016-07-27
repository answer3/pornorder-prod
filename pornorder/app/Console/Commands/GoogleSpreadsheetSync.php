<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class GoogleSpreadsheetSync extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'google:sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Google Spreadsheet sync job';
	
	private $sheet;
	private $jobLog;
	private $tubeList;
	private $newOrders = array();
	private $orderUpdateStatsData = array();
	private $validationErrors = false;
	private $validationRules = array('order id'=>'required',
									'order title'=>'required',
									'order description'=>'required',
									'order tags'=>'required',
									'video id' => 'integer',
									'video url'=>'required|active_url',
									'video title'=>'required',
									'video tags'=>'required',
									'suggested by userid' => 'integer'
		);
	
	const FILE_ID = '1DGyW2-Gzx-GterKI-MbfyJU_3PYTuhEy5mmoOVLL-II';
	const SHEET_NAME = 'Orders';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
		$path = base_path();	
		$client = \Google_Spreadsheet::getClient($path."/pornorder-dev-03f950443b28.json");
		$file = $client->file(self::FILE_ID);
		$this->sheet = $file->sheet(self::SHEET_NAME);
		
		$this->tubeList = \App\Tube::select('id','url')->get()->toArray();
		
		$this->jobLog = new Logger('name');
		$this->jobLog->pushHandler(new StreamHandler(base_path().'/storage/logs/google_sync.log', Logger::DEBUG));

    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
		$this->addLogandInfo('Sync Start');
		if(!count($this->sheet->items)){
			$this->addLogandInfo('There is no items in spreadsheet');
			$this->addLogandInfo('Sync Job Stop');
			return;
		}
		$items = $this->sheet->select(array("is_synced" => "0"));
		if(!$items){
			$this->addLogandInfo('Nothing to sync');
			$this->addLogandInfo('Sync Job Stop');
			return;
		}
		
		$this->addLogandInfo('Items count - '.count($items));
		
		foreach($this->sheet->items as $stringId=>$videoItem){
			$this->currentString = $stringId;
			if((int)$videoItem['is_synced']!==0){
				continue;
			}
			
			$this->addLogandInfo('Item order id - '.$videoItem['order id']);
			
			$videoItem = array_map('trim',$videoItem);
			
			if(!$this->validateItem($videoItem)){
				$this->addLogandInfo('Validation failed - string :: '.$stringId);
				$this->addLogandInfo('Validation errors - string :: '.  print_r($this->validationErrors));
				$updateGoogleData = ['is_synced'=>0,'sync_error'=>implode(' , ',$this->validationErrors)];
				$this->updateGoogleString($stringId, $updateGoogleData);
				continue;
			}
			
			$orderModel = $this->saveOrder($videoItem);
			$videoModel = $this->saveVideo($orderModel, $videoItem);
			$this->addLogandInfo('Save Order Tags...');
			$this->saveTags($orderModel, $videoItem['order tags']);
			$this->addLogandInfo('Save Video Tags...');
			$this->saveTags($videoModel, $videoItem['video tags']);
			if(isset($videoItem['video thumbs'])){
				$this->saveThumbs($videoModel, $videoItem['video thumbs']);
			}
			
			$this->orderUpdateStatsData[$orderModel->id][] = ['string_id'=>$stringId];
			
			$updateGoogleData = ['is_synced'=>1,'order id'=>$orderModel->id,'video id'=>$videoModel->id];
			$this->updateGoogleString($stringId, $updateGoogleData);
		}
		
		$this->updateGoogleStats();
		$this->addLogandInfo('Sync Job Stop');
    }
	
	private function validateItem($item){
		$this->validationErrors = false;
		$validator = \Illuminate\Support\Facades\Validator::make($item, $this->validationRules);
		if ($validator->fails()) {
			$this->validationErrors = $validator->errors()->all();
            return false;
        }
		
		return true;
	}
	
	private function saveOrder($videoItem){	
		if(strstr($videoItem['order id'],'neworder')){
			if(isset($this->newOrders[$videoItem['order id']])){
				$orderModel = \App\Order::find($this->newOrders[$videoItem['order id']]);
				$this->addLogandInfo('Get existing order order...');
			}else{
				$orderModel = new \App\Order();
				$this->addLogandInfo('Creting new order...');
			}
		}else{
			$orderModel = \App\Order::firstOrNew(['id' => $videoItem['order id']]);
			$this->addLogandInfo('Get existing order order...');
		}
		
		$orderModel->title = $videoItem['order title'];
		if(isset($videoItem['order description']) and $videoItem['order description']){
			$orderModel->description = $videoItem['order description'];
		}
		$orderModel->user_id = $videoItem['owners user_id'];
		$orderModel->save();
		$this->addLogandInfo('Order id - '.$orderModel->id);
		$this->addLogandInfo('Order title - '.$videoItem['order title'].':: Order description - '.$videoItem['order description'].':: Order owner id - '.$videoItem['owners user_id']);
		if(strstr($videoItem['order id'],'neworder')){
			$this->newOrders[$videoItem['order id']] = $orderModel->id;
		}
		
		return $orderModel;
	}
	
	private function saveVideo($orderModel,$videoItem){
		$tubeId = $this->getTubeId($videoItem['video url']);
		if(isset($videoItem['video id']) and $videoItem['video id']){
			$this->addLogandInfo('Update video...');
			$videoModel = $orderModel->videos()->firstOrNew(['id'=>$videoItem['video id']]);
			$videoModel->video_url = $videoItem['video url'];
			$videoModel->title = $videoItem['video title'];
			$videoModel->tube_id = $tubeId;
			$videoModel->user_id = $videoItem['suggested by userid'];
			$videoModel->save();
		}else{
			$this->addLogandInfo('Creating video...');
			$videoModel = $orderModel->videos()->create(array('video_url'=>$videoItem['video url'],
															'title'=>$videoItem['video title'],
															'tube_id'=>$tubeId,
															'user_id'=>$videoItem['suggested by userid'])
													);
		}
		$this->addLogandInfo('Video id - '.$videoModel->id);
		$this->addLogandInfo('Video url - '.$videoItem['video url'].' :: Video title - '.$videoItem['video title']);
		return $videoModel;
	}
	
	private function getTubeId($videoUrl){
		$videoUrl = str_replace(array('http://','https://','www.'), '', $videoUrl);
		foreach($this->tubeList as $tube){
			$tubeUrl = str_replace(array('http://','https://','www.'), '', $tube['url']);
			if(stristr($videoUrl, $tubeUrl)){
				return $tube['id'];
			}
		}
		$this->addLogandInfo("Can't get tube id from url - ".$videoUrl);
		return 0;
	}
	
	private function saveTags($model,$tags){
		$tagArray = explode(',', $tags);
		$tagArray = array_map('trim', $tagArray);
		$tagArray = array_map(function($value) { return preg_replace('/\s+/', '-', $value); }, $tagArray);
		$this->addLogandInfo('Tags - '.$tags);
		$model->tags()->delete();
		foreach($tagArray as $tag){
			if(!$tag){
				continue;
			}
			$model->tags()->create(['tag'=>$tag]);
		}
	}
	
	private function saveThumbs($model,$thumbs){
		if(!$thumbs){
			return;
		}
		$this->addLogandInfo('Thumbs - '.$thumbs);
		$thumbArray = explode('>,<', $thumbs);
		$thumbArray = array_map('trim', $thumbArray);
		$thumbArray = array_map(function($value) { return str_replace(array('>','<'), '', $value); }, $thumbArray);
		$tagModel = $model->thumbs()->delete();
				
		$order = 1;
		foreach($thumbArray as $thumb){
			if(!$thumb){
				continue;
			}
			$model->thumbs()->create(['file_path'=>$thumb,'type'=>'thumb','order'=>$order]);
			$order++;
		}
	}
	
	private function updateGoogleString($stringId, $data){
		foreach($data as $colName=>$value){
			$this->sheet->update(
				$stringId,$colName,$value
			);
		}
	}
	
	private function updateGoogleStats(){
		$this->addLogandInfo('Update order stats...');
		foreach($this->orderUpdateStatsData as $orderId=>$data){
			
			$this->addLogandInfo('Order id - '.$orderId);
			
			$totalVideosCount = \App\Video::where('order_id', $orderId)->count();
			
			$start = (new \Carbon\Carbon('now'))->hour(0)->minute(0)->second(0);
			$end = (new \Carbon\Carbon('now'))->hour(23)->minute(59)->second(59);
			$newVideosCount = \App\Video::where('order_id', $orderId)->whereBetween('updated_at',[$start,$end])->count();
			
			$dateStats = \App\Order::select('created_at','updated_at')->where('id', $orderId)->first();
			$this->addLogandInfo('Total videos - '.$totalVideosCount.' :: New videos - '.$newVideosCount.' :: Created date - '.$dateStats->created_at->toDateTimeString().' :: Last Update - '.$dateStats->updated_at->toDateTimeString());
			foreach($data as $item){
				$this->sheet->update($item['string_id'],'order date',$dateStats->created_at->toDateTimeString());
				$this->sheet->update($item['string_id'],'last updated',$dateStats->updated_at->toDateTimeString());
				$this->sheet->update($item['string_id'],'videos in order total',$totalVideosCount);
				$this->sheet->update($item['string_id'],'videos in order new',$newVideosCount);
			}
		}
	}
	
	private function addLogandInfo($message){
		$this->info($message);
		$this->jobLog->addDebug($message);
	}
	
}
