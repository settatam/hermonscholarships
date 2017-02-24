@extends('layouts.app')

@section('content')

<!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="text-center margin-top-50 container">
        <h1>Choose a Child to support</h1>
        <p>
Join Thousands of People Who Are Giving A Child A Future</p>
      </div>
    </div>



    <div class="container">
   
     <div class="text-center starter-template">
        <h1>Choose a Child to support</h1>
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
  </div>
  @endforeach
  
  {{-- $students->links() --}}
  
</div><!-- /.row -->
      
   </div>   
@endsection
