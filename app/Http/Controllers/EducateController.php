<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Student;

class EducateController extends Controller
{
    //

	public function index () {



		 $students = \DB::table('students')
            ->join('photos', 'students.id', '=', 'photos.student_id')
            ->select('students.*', 'photos.photos')
            ->get();


		return view('Educate.educate',compact('students'));
	 }




}
