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
	
	private $file;
	private $sheet;
	private $jobLog;
	private $tubeList;
	private $newOrders = array();
	private $ordersToUpdate = array();
	private $ordersStats = array();
	private $validationErrors = false;
	private $validationRules = array('order-id'=>'required',
									'order-title'=>'required',
									'order-description'=>'required',
									'order-tags'=>'required',
									'video-id' => 'integer',
									'video-url'=>'required|active_url',
									'video-title'=>'required',
									'video-tags'=>'required',
									'suggested-by-userid' => 'integer'
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
		$this->file = $client->file(self::FILE_ID);
		$this->sheet = $this->file->sheet(self::SHEET_NAME);
		
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
		$this->syncGoogleToDB();
		$this->syncDBToGoogle();
		$this->updateGoogleStats();
    }
	
	private function syncGoogleToDB(){
		$this->addLogandInfo('Google-to-DB Sync Start');
		if(!count($this->sheet->items)){
			$this->addLogandInfo('There is no items in spreadsheet');
			$this->addLogandInfo('Google-to-DB Sync Job Stop');
			return;
		}
		$items = $this->sheet->select(array("is-synced" => "0","video-status"=>"approved"));
		if(!$items){
			$this->addLogandInfo('Nothing to sync');
			$this->addLogandInfo('Google-to-DB Sync Job Stop');
			return;
		}
		
		$this->addLogandInfo('Items count - '.count($items));
		
		foreach($this->sheet->items as $stringId=>$videoItem){
			if((int)$videoItem['is-synced']!==0){
				continue;
			}
			
			$this->addLogandInfo('Item order id - '.$videoItem['order-id']);
			
			$videoItem = array_map('trim',$videoItem);
			
			if(!$this->validateItem($videoItem)){
				$this->addLogandInfo('Validation failed - string :: '.$stringId);
				$this->addLogandInfo('Validation errors - string :: '.  print_r($this->validationErrors));
				$updateGoogleData = ['is-synced'=>0,'sync-error'=>implode(' , ',$this->validationErrors)];
				$this->updateGoogleString($stringId, $updateGoogleData);
				continue;
			}
			
			if($videoItem['deleted']==1){
				$this->addLogandInfo('Delete video id - '.$videoItem['video-id']);
				$this->deleteVideoInDB($videoItem['video-id']);
				$updateGoogleData = ['is-synced'=>1];
				$this->updateGoogleString($stringId, $updateGoogleData);
				continue;
			}
			
			$orderModel = $this->saveOrder($videoItem);
			$videoModel = $this->saveVideo($orderModel, $videoItem);
			$this->addLogandInfo('Save Order Tags...');
			$this->saveTags($orderModel, $videoItem['order-tags']);
			$this->addLogandInfo('Save Video Tags...');
			$this->saveTags($videoModel, $videoItem['video-tags']);
			if(isset($videoItem['video-thumbs'])){
				$this->saveThumbs($videoModel, $videoItem['video-thumbs']);
			}
			
			if(!in_array($orderModel->id, $this->ordersToUpdate)){
				$this->ordersToUpdate[] = $orderModel->id;
			}
			
			$updateGoogleData = ['is-synced'=>1,'order-id'=>$orderModel->id,'video-id'=>$videoModel->id];
			$this->updateGoogleString($stringId, $updateGoogleData);
		}
		$this->addLogandInfo('Google-to-DB Sync Job Stop');
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
		if(strstr($videoItem['order-id'],'neworder')){
			if(isset($this->newOrders[$videoItem['order-id']])){
				$orderModel = \App\Order::find($this->newOrders[$videoItem['order-id']]);
				$this->addLogandInfo('Get existing order order...');
			}else{
				$orderModel = new \App\Order();
				$this->addLogandInfo('Creting new order...');
			}
		}else{
			$orderModel = \App\Order::firstOrNew(['id' => $videoItem['order-id']]);
			$this->addLogandInfo('Get existing order order...');
		}
		
		$orderModel->title = $videoItem['order-title'];
		if(isset($videoItem['order-description']) and $videoItem['order-description']){
			$orderModel->description = $videoItem['order-description'];
		}
		$orderModel->user_id = $videoItem['owners-user-id'];
		$orderModel->save();
		$this->addLogandInfo('Order id - '.$orderModel->id);
		$this->addLogandInfo('Order title - '.$videoItem['order-title'].':: Order description - '.$videoItem['order-description'].':: Order owner id - '.$videoItem['owners-user-id']);
		if(strstr($videoItem['order-id'],'neworder')){
			$this->newOrders[$videoItem['order-id']] = $orderModel->id;
		}
		
		return $orderModel;
	}
	
	private function saveVideo($orderModel,$videoItem){
		$tubeId = $this->getTubeId($videoItem['video-url']);
		if(isset($videoItem['video-id']) and $videoItem['video-id']){
			$this->addLogandInfo('Update video...');
			$videoModel = $orderModel->videos()->firstOrNew(['id'=>$videoItem['video-id']]);
			$videoModel->video_url = $videoItem['video-url'];
			$videoModel->title = $videoItem['video-title'];
			$videoModel->tube_id = $tubeId;
			$videoModel->suggested_by_user_id = $videoItem['suggested-by-userid'];
			$videoModel->save();
		}else{
			$this->addLogandInfo('Creating video...');
			$videoModel = $orderModel->videos()->create(array('video_url'=>$videoItem['video-url'],
															'title'=>$videoItem['video-title'],
															'tube_id'=>$tubeId,
															'user_id'=>$videoItem['suggested-by-userid'])
													);
		}
		$this->addLogandInfo('Video id - '.$videoModel->id);
		$this->addLogandInfo('Video url - '.$videoItem['video-url'].' :: Video title - '.$videoItem['video-title']);
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
		$sheet = $this->file->sheet(self::SHEET_NAME);
		foreach($sheet->items as $stringId=>$item){
			
			if(!in_array($item['order-id'],$this->ordersToUpdate)){
				continue;
			}
			
			$this->addLogandInfo('Update Order id - '.$item['order-id'].' String - '.$stringId);
			
			$statData = $this->getOrderStat($item['order-id']);
			
			$this->sheet->update($stringId,'order-date',$statData['created']);
			$this->sheet->update($stringId,'last-updated',$statData['updated']);
			$this->sheet->update($stringId,'videos-in-order-total',$statData['total']);
			$this->sheet->update($stringId,'videos-in-order-new',$statData['new']);
			
		}
	}
	
	private function getOrderStat($orderId){
		if(isset($this->ordersStats[$orderId])){
			return $this->ordersStats[$orderId];
		}
		$data['total'] = \App\Video::where('order_id', $orderId)->count();
			
		$start = (new \Carbon\Carbon('now'))->subDays(6)->hour(0)->minute(0)->second(0);
		$end = (new \Carbon\Carbon('now'))->hour(23)->minute(59)->second(59);
		$data['new'] = \App\Video::where('order_id', $orderId)->whereBetween('updated_at',[$start,$end])->count();
			
		$dateStats = \App\Order::select('created_at','updated_at')->where('id', $orderId)->first();
		$data['created'] = $dateStats->created_at->toDateTimeString();
		$data['updated'] = $dateStats->updated_at->toDateTimeString();
		
		$this->ordersStats[$orderId] = $data;
		
		return $this->ordersStats[$orderId];
	}
	
	private function addLogandInfo($message){
		$this->info($message);
		$this->jobLog->addDebug($message);
	}
	
	private function syncDBToGoogle(){
		$this->addLogandInfo('DB-to-Google Sync Start');
		$this->updateFromDBToGoogle();
		$this->addContribsFromDB();
		$this->addLogandInfo('DB-to-Google Sync Stop');
	}
	
	private function addContribsFromDB(){
		$this->addLogandInfo('Adding videos from DB to Google...');
		$addVideos = \App\Video::where('to_add',1)->get();
		if(!$addVideos){
			$this->addLogandInfo('There is no new videos from DB to Google...');
			return;
		}
		foreach ($addVideos as $addVideoItem){
			
			$dataToRow['order-id'] = $addVideoItem->order_id;
			$dataToRow['order-title'] = $addVideoItem->order->title;
			$dataToRow['order-description'] = $addVideoItem->order->description;
			
			if(!in_array($addVideoItem->order_id, $this->ordersToUpdate)){
				$this->ordersToUpdate[] = $addVideoItem->order_id;
			}
			
			$dataToRow['owners-user-id'] = $addVideoItem->order->user_id;
			$orderTags = $addVideoItem->order->tags()->get()->toArray();
			if($orderTags){
				$orderTagsArr = array_map(function($tagArr){return $tagArr['tag'];},$orderTags);
				$dataToRow['order-tags'] = implode(',',$orderTagsArr);
			}
			
			$dataToRow['video-id'] = $addVideoItem->id;
			$dataToRow['video-url'] = $addVideoItem->video_url;
			$dataToRow['video-title'] = $addVideoItem->title;
			
			$videoTags = $addVideoItem->tags()->get()->toArray();
			if($videoTags){
				$videoTagsArr = array_map(function($tagArr){return $tagArr['tag'];},$videoTags);
				$dataToRow['video-tags'] = implode(',',$videoTagsArr);
			}
			
			$thumbs = $addVideoItem->thumbs()->get()->toArray();
			if($thumbs){
				$thumbsArr = array_map(function($thumbs){return '<'.$thumbs['file_path'].'>';},$thumbs);
				$dataToRow['video-thumbs'] = implode(',',$thumbsArr);
			}
			$dataToRow['suggested-by-userid'] = (string)$addVideoItem->suggested_by_user_id;
			$dataToRow['video-status'] = 'new';
			$dataToRow['order-date'] = $addVideoItem->order->created_at->toDateTimeString();
			$dataToRow['last-updated'] = $addVideoItem->order->updated_at->toDateTimeString();
			$dataToRow['deleted'] = '0';
			$dataToRow['is-synced'] = '1';
			$dataToRow['sync-error'] = '';
			$this->addLogandInfo('Adding new video...');
			$this->addLogandInfo('Video Data - '.print_r($dataToRow,true));
			$this->sheet->insert($dataToRow);
			$addVideoItem->to_add = 0;
			$addVideoItem->save();
		}
	}
	
	private function updateFromDBToGoogle(){
		$this->addLogandInfo('Updateing videos from DB to Google...');
		$updateVideos = \App\Video::withTrashed()->where('to_update',1)->get();
		if(!$updateVideos){
			$this->addLogandInfo('There is no videos to update...');
			return;
		}
		foreach ($updateVideos as $updateVideoItem){
			$originalRowNum = $this->getGoogleRowNumber($updateVideoItem->id);
			if(!$originalRowNum){
				continue;
			}
			
			$dataToRow['order-date'] = $updateVideoItem->order->created_at->toDateTimeString();
			$dataToRow['last-updated'] = $updateVideoItem->order->updated_at->toDateTimeString();
			
			if(!in_array($updateVideoItem->order_id, $this->ordersToUpdate)){
				$this->ordersToUpdate[] = $updateVideoItem->order_id;
			}
			
			$dataToRow['owners-user-id'] = $updateVideoItem->order->user_id;
			
			if($updateVideoItem->deleted_at){
				$dataToRow['video-status'] = 'deleted';
				$dataToRow['deleted'] = '1';
				$dataToRow['is-synced'] = '1';
				$dataToRow['sync-error'] = '';
				$this->addLogandInfo('Deleted video id - '.$updateVideoItem->id);
				$this->updateGoogleString($originalRowNum, $dataToRow);
				$updateVideoItem->to_update = 0;
				$updateVideoItem->save();
				continue;
			}
			
			$dataToRow['order-id'] = $updateVideoItem->order_id;
			$dataToRow['order-title'] = $updateVideoItem->order->title;
			$dataToRow['order-description'] = $updateVideoItem->order->description;
			
			$orderTags = $updateVideoItem->order->tags()->get()->toArray();
			if($orderTags){
				$orderTagsArr = array_map(function($tagArr){return $tagArr['tag'];},$orderTags);
				$dataToRow['order-tags'] = implode(',',$orderTagsArr);
			}
			
			$dataToRow['video-id'] = $updateVideoItem->id;
			$dataToRow['video-url'] = $updateVideoItem->video_url;
			$dataToRow['video-title'] = $updateVideoItem->title;
			
			$videoTags = $updateVideoItem->tags()->get()->toArray();
			if($videoTags){
				$videoTagsArr = array_map(function($tagArr){return $tagArr['tag'];},$videoTags);
				$dataToRow['video-tags'] = implode(',',$videoTagsArr);
			}
			
			$thumbs = $updateVideoItem->thumbs()->get()->toArray();
			if($thumbs){
				$thumbsArr = array_map(function($thumbs){return '<'.$thumbs['file_path'].'>';},$thumbs);
				$dataToRow['video-thumbs'] = implode(',',$thumbsArr);
			}
			$dataToRow['suggested-by-userid'] = (string)$updateVideoItem->suggested_by_user_id;
			$dataToRow['video-status'] = 'updated';
			$dataToRow['deleted'] = '0';
			$dataToRow['is-synced'] = '1';
			$dataToRow['sync-error'] = '';
			
			$this->addLogandInfo('Updating video...');
			$this->addLogandInfo('Video data - '.  print_r($dataToRow,true));
			$this->updateGoogleString($originalRowNum, $dataToRow);
			
			$updateVideoItem->to_update = 0;
			$updateVideoItem->save();
		}
	}

	private function deleteVideoInDB($videoId){
		$videoModel = \App\Video::find($videoId);
		if(!$videoModel){
			return;
		}
		$videoModel->delete();
	}
	
	private function getGoogleRowNumber($videoId){
		$updatedRow = $this->sheet->select(['video-id'=>(string)$videoId]);
		if(!$updatedRow){
			return false;
		}
		return $updatedRow[0]['original_row_num'];
	}
	
}
