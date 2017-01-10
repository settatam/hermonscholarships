<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Student;

class EducateController extends Controller
{
    //
	
	public function index ( ) {
		
		
	    $students = Student::all();

		return view('Educate.educate',compact('students'));
	 }



	
}
