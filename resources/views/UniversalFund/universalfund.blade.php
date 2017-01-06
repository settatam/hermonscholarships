@extends('layouts.app')

@section('content')

<!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="text-center margin-top-50 container">
        <h1>UNIVERSAL FUND</h1>
        <p>Join with a recurring donation and automatically support a new hermon child every month. </p>    
        <div class="donation_field">
        <form action="recurring-payment" method="get">
          <input name="donation_amount" placeholder="Enter Amount"  maxlength="6" pattern="\d*" type="text">
          <input value="Give monthly" class="donate_button" type="submit">
          </form>
        </div>
       </div>
    </div>



    <div class="container">
    
     <div class="text-center starter-template">
        <h1>Choose a Childe to support</h1>
        <p class="lead">100% of your Donation will go into their education</p>
      </div>
      <!-- Example row of columns -->
      
   </div>   
@endsection
