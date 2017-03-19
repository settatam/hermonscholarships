<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class FundController extends Controller
{
    //

	public function index ($slug,$student_id) {
		$page_title ='Sponsor |  '.config('app.name');
		$photo   = Student::find($student_id)->photo;

		return view('Fund.payment',compact('page_title','photo'));
	}

	public function charge(Request $request) {
		dd($request->input());
	}

}
