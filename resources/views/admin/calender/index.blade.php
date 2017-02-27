@extends('layouts.admin')

@section('content')




  <div class="container">
    
    <div class="row">
      <div class="col-md-3">
         @include('layouts.aside')
       
        </div>
       
          <div class="col-md-8">
          <div class="panel panel-primary">
            <h2>Academic Calender For {{ $student->fullname()}}</h2>
              @include('layouts.success')
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Title</th>
                      <th>Description</th>
                    
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                   
                   @if(count($calender))
                         @foreach($calender as $details)
                        <tr>
                          <td>{{$details->title}}</td>
                          <td>{{$details->description}}</td>
                          <td><a href="/admin/delete/calender/{{$details->id}}" class="btn btn-default">Delete</a></td>
                        </tr>
                        @endforeach
                        @else
                         <tr>
                          <td>No Data</td>
                          
                        </tr>
                    @endif
                  
                    <tr>
                      <td colspan="5" class="text-right">  <a href="/admin/calender/add/{{$student_id}}" class="btn btn-default">Add Calender</a></td>
                   </tr>
                  </tbody>
                </table>
          
          </div>
          
          
          
        
        </div>
     </div> 
  </div>   
@endsection
