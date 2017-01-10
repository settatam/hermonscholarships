<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    //
	protected $table = 'parents';
	
	protected $fillable = [
        'name','last_name','phone','address','address_2','city','state','job','salary_range',
     ];
}
