<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Student;

class HomeController extends Controller {

     public function __construct ( ) {


	   $this->middleware('checkAccess');

	}

   public function index()
    {
	   
        return view('admin.index');
		
		
    }
}
