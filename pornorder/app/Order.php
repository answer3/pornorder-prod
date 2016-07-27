<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function videos()
    {
        return $this->hasMany('App\Video');
    }
	
	public function tags()
    {
        return $this->hasMany('App\OrderTag');
    }
}
