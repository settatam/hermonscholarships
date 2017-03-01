<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
	protected $fillable = [
        'parent_id','user_id','name','last_name','description','grade','amount_raised','amount','date_of_birth'
     ];
	 protected $dates = [
        'date_of_birth'
     ];
	 public function additional_images(){
	  return $this->hasMany('App\AdditionalImage');	
	}
	
	 public function photo(){
	  return $this->hasOne('App\Photo');
	}
	public function calender(){
	  return $this->hasMany('App\SchoolCalender');
	}
	
	public function fullname() { 
	  return ucfirst($this->name) . ' '.ucfirst($this->last_name); 
	}
	
	
	
	public function formatDate(  ) { 
	 
	  $dob = str_replace('ago',' ',$this->date_of_birth->diffForHumans());
	  return $dob;
	}
	
	
}
