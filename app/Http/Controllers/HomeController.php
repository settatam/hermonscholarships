<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

use App\Student;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
	   
		
		// Better
		  Schema::dropIfExists('migrations');
		  Schema::dropIfExists('additional_images');
		  Schema::dropIfExists('password_resets');
		  Schema::dropIfExists('photos');
          Schema::dropIfExists('school_calenders');
		  Schema::dropIfExists('students');

		$students = \DB::table('students')
            ->join('photos', 'students.id', '=', 'photos.student_id')
            ->select('students.*', 'photos.photos')
            ->get();
		
        return view('index',compact('students'));
    }
}
