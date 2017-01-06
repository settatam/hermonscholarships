<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UniversalFundController extends Controller
{
    //
	
	public function index ( ) {
		
		return view('UniversalFund.universalfund');
	}
	public function recurringpayment  ( Request $request ) { 
	
	   $amount =  $request->donation_amount;
	   return view('UniversalFund.recurringpayment',compact( 'amount'));
	}
}
