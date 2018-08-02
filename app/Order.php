<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Nicolaslopezj\Searchable\SearchableTrait;

class Order extends Model
{
    //
    protected $fillable = [
    	'number',
    	'year',
    	'com_name',
    	'note',
    ];

    public function files(){
    	return $this->hasMany('App\File');
    }

}
