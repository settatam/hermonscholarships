<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class FundController extends Controller
{
    //
	
	public function index ($student_id) {
		
		$photo   = Student::find($student_id)->photo;

		return view('Fund.payment',compact('photo'));
	}
	
}
