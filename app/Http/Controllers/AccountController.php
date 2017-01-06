<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class  AccountController extends Controller
{
    //
	
	public function index ( ) {
		
		return view('account.index');
	}

    public function chp ( ) {
	 	
		return view('account.chp');
	}
	
	public function address ( ) {
	 	
		return view('account.address');
	}
	public function donations ( ) {
	 	
		return view('account.donations');
	}

	
}
