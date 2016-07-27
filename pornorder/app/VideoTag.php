<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoTag extends Model
{
    protected $table = 'tags_videos';
	
	public $timestamps = false;
	
	protected $touches = ['video'];
	
	protected $fillable = [
        'tag'
    ];
	
	public function video()
    {
        return $this->belongsTo('App\Video');
    }
}
