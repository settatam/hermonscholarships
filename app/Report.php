<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    //
	
	public function students(){
	  return $this->belongsTo('App\Student');	
	}
}
