<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
	
	protected $fillable = [
        'student_id','photos'
     ];
	 
	 public $timestamps = false;
}
