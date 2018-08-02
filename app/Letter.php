<?php
 
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Nicolaslopezj\Searchable\SearchableTrait;

class Letter extends Model
{
    protected $fillable = [
    	'date',
    	'title',
    	'subject',
    	
    ];

    public function subletters(){
    	return $this->hasMany('App\Subletter');
    }
}
