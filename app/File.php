<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    //
    protected $fillable = [
    	'name',
    	'file',
    	'note',
    	'order_id',
    ];

    public function order(){
    	return $this->belongsTo('App\Order');
    }
}
 