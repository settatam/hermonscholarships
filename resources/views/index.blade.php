@extends('layouts.app')

@section('content')

<!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="text-center container">
        <h1>Help School A Child</h1>
        <p>
Join Thousands of People Who Are Giving A Child A Future</p>
        <p><a class="btn btn-primary btn-lg" href="/fund" role="button">Educate A Child &raquo;</a></p>
      </div>
    </div>



    <div class="container">
    
     <div class="text-center starter-template">
        <h1>Meet Our Kids</h1>
        <p class="lead">100% of your Donation will go into their education</p>
      </div>
      <!-- Example row of columns -->
      <div class="row">
    
     @foreach ($students as $details )
    <div class="col-sm-6 col-md-4">
    <a href="/view/{{$details->id}}">

      <div class="thumbnail">

       <img class="img-responsive" src="images/students/{{$details->photos}}" alt="...">
        <div class="caption">
        <h3>{{ $details->name}}  {{ $details->last_name}}</h3>
        <p class="truncate">{{ $details->description}}</p>
        
      </div>
    </div>
    </a>
    <p></p>
  </div>
  @endforeach
  
</div><!-- /.row -->
     <div class="row">
        <div class="col-md-12">        <p class="text-center"><a class="btn btn-primary btn-lg" href="/fund" role="button">View All&raquo;</a></p>
</div>
     </div> 
   </div>   
@endsection
