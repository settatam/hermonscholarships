<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
	protected $fillable = [
        'parent_id','user_id','name','last_name','description','grade','amount_raised','amount','date_of_birth'
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
	  $d = explode(',',$this->date_of_birth);
	  $dob =   \Carbon\Carbon::createFromDate($d[0],$d[1],$d[2]);
	  $dob = str_replace('ago',' ',$dob->diffForHumans());
	  return $dob;
	}
	
	
}
