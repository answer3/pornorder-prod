<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
        'video_url', 'title', 'tube_id','user_id'
    ];
	
	protected $touches = ['order'];
	
	public function tags()
    {
        return $this->hasMany('App\VideoTag');
    }
	
	public function thumbs()
    {
        return $this->hasMany('App\VideoThumb');
    }
	
	public function order()
    {
        return $this->belongsTo('App\Order');
    }
}
