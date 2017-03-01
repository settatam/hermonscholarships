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

        $page_title = $student->fullname()  .'  Profile|'.config('app.name', 'Laravel');
		
		return view('view.index',compact('page_title','calender','additional_images','student','photo'));
	}

    

	
}
