<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderTag extends Model
{
    protected $table = 'tags_orders';
	
	public $timestamps = false;
	
	protected $fillable = [
        'tag'
    ];
	
	protected $touches = ['order'];
	
	public function order()
    {
        return $this->belongsTo('App\Order');
    }
}
