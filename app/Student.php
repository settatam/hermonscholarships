<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
	protected $fillable = [
        'parent_id','user_id','name','last_name','description','grade','amount_raised','amount','date_of_birth'
     ];
	 
	 public function reports(){
	  return $this->hasMany('App\Report');	
	}
	
	 public function photo(){
	  return $this->hasOne('App\Photo');
	}
}
