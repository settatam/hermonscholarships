<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class  ViewController extends Controller
{
    //
	
	public function index ( Request $request,$id) {
		
		return view('view.index');
	}

    

	
}
