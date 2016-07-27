<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoThumb extends Model
{
    protected $table = 'video_thumbs';
	
	public $timestamps = false;
	
	protected $fillable = [
        'file_path','type','order'
    ];
	
	protected $touches = ['video'];
	
	public function video()
    {
        return $this->belongsTo('App\Video');
    }
}
