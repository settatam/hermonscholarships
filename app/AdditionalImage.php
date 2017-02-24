<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdditionalImage extends Model
{
    //
	
	protected $table = 'additional_images';
	
	protected $fillable =['student_id','images'];
	
	public function students(){
	  return $this->belongsTo('App\Student');	
	}
}
