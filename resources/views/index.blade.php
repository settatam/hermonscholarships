@extends('layouts.app')

@section('content')

<!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="hero">
            <img class="js-mediaFit" src="/images/banner.jpg" alt="Hermon Scholarships - Help Fund a student" />
        </div>




    <div class="container">

     <div class="text-center starter-template" style="padding-top: 50px;">
        <h1>HELP EDUCATE A CHILD. </h1>
        <h2>With $12/month, you can provide a less privileged Child desperately needed education.</h2>
        <a href="/how-it-works" class="how-it-works"> How it works </a>
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
        <div class="progress">
          <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
            60%
          </div>
       </div>
        <div class="funding_stats">
          <div class="stat funded"><span class="numerical">37% funded</span></div>
          <div class="stat raised"><span class="numerical">$27 raised</span></div>
          <div class="stat to_go"><span class="numerical">$455 to go</span></div>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
    </a>
  </div>
  @endforeach

</div><!-- /.row -->
     <div class="row">
        <div class="col-md-12">
</div>
     </div>
   </div>
@endsection
