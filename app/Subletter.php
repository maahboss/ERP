<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subletter extends Model
{
    protected $fillable = [
    	'date',
    	'title',
    	'subject',
    	'letter_id',
    	
    ];

    public function letter(){
    	return $this->belongsTo('App\Letter');
    }
}
 