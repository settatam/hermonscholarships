@extends('layouts.app')

@section('content')

<!-- Main jumbotron for a primary marketing message or call to action -->



    <div class="container">

     <div class=" starter-template">
        <h1></h1>
      </div>
      <!-- Example row of columns -->
      <div class="row">

        <div class="col-md-6">
         <div class="main-image">
            <img  src="/images/students/{{$photo->photos}}"  class="img-reponsive js-mediaFit" alt="{{$photo->photos}}"  />
         </div>
          <br/>
       <div class="row">
          @if( count($additional_images) )
             <div  class="col-md-2 thumbnails clearfix">
                <a href="#" class=""><img  class="img-responsive" src="/images/students/{{$photo->photos}}" alt="" title=""></a>
             </div>
            @foreach ($additional_images as $details )
            <div  class="col-md-2 thumbnails clearfix">
                <a href="#" class=""><img class="img-responsive"  src="/images/students/additionalimages/{{$details->images}}" alt="" title=""></a>
             </div>
            @endforeach
          @endif
          </div>




          <p class="margin-top-40">

          <p>{{--$student->created_at--}}</p>
            {{$student->description}}
          </p>
        <hr/>


       <div class="media">
               <h3 class="">{{date('Y')}} Academic Calender  For {{$student->fullname()}}</h3>
                <hr/>
                  <div class="">
                  @if(count($calender))
                    @foreach($calender as $details)
                   <h4>{{$details->title}}</h4>
                   <p>{{$details->description}}</p>
                   <hr/>
                    @endforeach

                   @else

                    <h4>No Calender Yet</h4>
                  @endif
                  </div>

            </div>
        </div>

        <div class="col-md-6 student-details">
          <h1> {{ $student->fullname()}} </h1>

          <p>{{ $student->fullname() }} is a {{ $student->formatDate()}} old pupil of All Nations Nursery and Primary School, Lagos Nigeria. When she grows up, she want to be a Medical Doctor.
            <p> To Support {{ $student->fullname() }} click the sponsor button below.</p>
          </p>

       <form action="" method="post" class="form-horizontal">
              <div class="form-group">
        <label class="col-sm-3 control-label" for="expiry-month"> Number of Months</label>
        <div class="col-sm-9">
          <div class="row">
            <div class="col-xs-3">
              <input type="text" name="no_of_months" required="required" value="" placeholder="" class="form-control" />
            </div>

            <div class="col-xs-3">
               <span> /</span>
              Months.
            </div>
          </div>
        </div>
      </div>

           </form>

          <div class="btn-group btn-group-justified" role="group" aria-label="...">
          <div class="btn-group" role="group">

            <button type="button" onclick="location.href='/sponsor/{{$student->slug}}/{{$student->id}}/'" class="btn btn-default btn-group">Sponsor</button>
          </div>


         </div>
        </div>


       </div><!-- /.row -->
     <div class="row">
</div>
     </div>
   </div>
@endsection
