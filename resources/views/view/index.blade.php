@extends('layouts.app')

@section('content')

<!-- Main jumbotron for a primary marketing message or call to action -->
   


    <div class="container">
    
     <div class=" starter-template">
        <h1></h1>
      </div>
      <!-- Example row of columns -->
      <div class="row">
     
        <div class="col-md-7">
        
         <img  src="/images/students/{{$photo->photos }}"  class="img-rounded" alt="..."
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
  
        <div class="col-md-5">
        
           
            <ul class="client-details">
                <li>
                    <p><span>Name:</span>   {{ $student->fullname()}}</p>
                </li>
                <li>
                    <p><span>Age :</span>  {{ $student->date_of_birth}}</p>
                </li>
                <li>
                    <p><span>Class :</span>  {{ $student->grade}}</p>
                </li>
                <li>
                    <p><span>Time To Complete school :</span> {{ $student->timeframe}}</p>
                </li>
                
                
                                                                                                                                                           
            </ul>
         
        
        
        
          <div class="btn-group btn-group-justified" role="group" aria-label="...">
          <div class="btn-group" role="group">
            <button type="button" onclick="location.href='/payment/{{$student->id}}'" class="btn btn-default btn-group">Sponsor</button>
          </div>
          
          
         </div>
        </div>

  
       </div><!-- /.row -->
     <div class="row">
</div>
     </div> 
   </div>   
@endsection
