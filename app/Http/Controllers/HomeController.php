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
	     Schema::dropIfExists('migrations'); 
	     //$students = Student::all();
		 
		// $tables = \DB::select('SHOW TABLES');
		/* Schema::dropIfExists('migrations');
		 Schema::dropIfExists('additional_images');
		 Schema::dropIfExists('password_resets');
		 Schema::dropIfExists('photos');
		 Schema::dropIfExists('reports');
		 Schema::dropIfExists('school_calenders');
		 Schema::dropIfExists('tests');
		 Schema::dropIfExists('students');
		 Schema::dropIfExists('users');*/
		 //dd($tables);
		
		/* $students = \DB::table('students')
            ->join('photos', 'students.id', '=', 'photos.student_id')
            ->select('students.*', 'photos.photos')
            ->get();
		
        return view('index',compact('students'));*/
    }
}
