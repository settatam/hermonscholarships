<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Student;

class HomeController extends Controller {

     public function __construct ( ) {


	   //$this->middleware('checkAccess');

	}

   public function index()
    {
	    $number_of_students = Student::count();
        return view('admin.index',compact('number_of_students'));
    }
}
