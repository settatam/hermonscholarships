@extends('layouts.app')

@section('content')

<!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="hero">
            <img class="js-mediaFit" src="/images/banner.jpg" alt="Hermon Scholarships - Help Fund a student" />
            <div class="hero-caption">
                <h2>WELCOME TO </h2>
                <h1> HERMON SCHOLARSHIPS </h2>
                <p> We raise and distribute funds which provides primary and secondary education to low-income and high risk children</p>
                <a class="cta" href="/fund"> MEET OUR KIDS </a>
            </div>
        </div>




    <div class="container">

     <div class="text-center starter-template intro-copy">
        <h1>HELP EDUCATE A CHILD. </h1>
        <h2>With $12/month, you can provide a less privileged Child desperately needed education.</h2>
        <a href="/how-it-works" class="how-it-works"> How it works </a>
      </div>
      <!-- Example row of columns -->
      <div class="row">

     @foreach ($students as $details )
    <div class="col-sm-6 col-md-4">
    <a href="/view/{{$details->id}}/{{$details->slug}}">

      <div class="thumbnail">
        <div class="thumbnail-image">
          <img class="img-responsive js-mediaFit" src="images/students/{{$details->photos}}" alt="Support a child">
        </div>

        <div class="caption">
        <h3>{{ $details->name}}  {{ $details->last_name}}</h3>
        <p class="truncate">{{-- $details->description--}}</p>

      </div>
    </div>
    </a>
    <p></p>
  </div>
  @endforeach

</div><!-- /.row -->
     <div class="row">
        <div class="col-md-12">
</div>
     </div>
   </div>
@endsection
