@extends('layouts.app')

@section('content')

<!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="text-center container">
        <h1>Help School A Child</h1>
        <p>
Join Thousands of People Who Are Giving A Child A Future</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Educate A Child &raquo;</a></p>
      </div>
    </div>



    <div class="container">
    
     <div class="text-center starter-template">
        <h1>Meet Our Kids</h1>
        <p class="lead">100% of your Donation will go into their education</p>
      </div>
      <!-- Example row of columns -->
      <div class="row">
    <div class="col-sm-6 col-md-4">
  <a href="/view/3">
      <div class="thumbnail">

       <img src="images/African-child.jpg" alt="...">
        <div class="caption">
        <h3>Thumbnail label</h3>
        <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
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
  <div class="col-sm-6 col-md-4">
  <a href="/view/3">
      <div class="thumbnail">

       <img src="images/image1.jpg" alt="...">
        <div class="caption">
        <h3>Thumbnail label</h3>
        <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
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
  <div class="col-sm-6 col-md-4">
    <a href="/view/3">

      <div class="thumbnail">

       <img class="img-responsive" src="images/Child-UNICEF.jpg" alt="...">
        <div class="caption">
        <h3>Thumbnail label</h3>
        <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
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
  
</div><!-- /.row -->
     <div class="row">
        <div class="col-md-12">        <p class="text-center"><a class="btn btn-primary btn-lg" href="#" role="button">View All&raquo;</a></p>
</div>
     </div> 
   </div>   
@endsection
