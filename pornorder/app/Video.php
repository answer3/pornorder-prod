<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Video extends Model
{
	use SoftDeletes;
	
    protected $fillable = [
        'video_url', 'title', 'tube_id','user_id'
    ];
	
	protected $dates = ['deleted_at'];
	
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
