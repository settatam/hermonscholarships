<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Student;

class  ViewController extends Controller
{
    //
	
	public function index ( Request $request,$id) {
		
		$student  = Student::find($id);
		
		$reports = Student::find($id)->reports;
		
	    $photo   = Student::find($id)->photo;

		
		return view('view.index',compact('student','reports','photo'));
	}

    

	
}
