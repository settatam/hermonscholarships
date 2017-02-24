<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Student;

class  ViewController extends Controller
{
    //
	
	public function index ( Request $request,$id) {
		
		$student  = Student::find($id);
		
		$additional_images  = Student::find($id)->additional_images;
				
	    $photo   =   Student::find($id)->photo;
		
		$calender =  Student::find($id)->calender;


		return view('view.index',compact('calender','additional_images','student','photo'));
	}

    

	
}
