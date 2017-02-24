@extends('layouts.admin')

@section('content')




  <div class="container">
    
    <div class="row">
      <div class="col-md-3">
         @include('layouts.aside')
       
        </div>
       
       

          <div class="col-md-9">
          <div class="panel panel-primary">
            <h2>Students</h2>
              @include('layouts.success')
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Image</th>
                      <th>Name</th>
                      <th>Grade</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($students as $details )
                    <tr>
                     <td> <img width="100" height="100" src="/images/students/{{$details->photos}}"  /></td>
                      <td> {{ $details->name }}  {{ $details->last_name}}</td>
                      <td>{{ $details->grade}}</td>
                      
                      <td>
                         
                            <a href="/admin/view/students/{{ $details->id}}" class="btn btn-default">View</a>&nbsp;
                            <a href="/admin/edit/students/{{ $details->id}}" class="btn btn-default">Edit</a>&nbsp;
                            <a href="/admin/delete/students/{{ $details->id}}" class="btn btn-default">Delete</a>
                            <a href="/admin/calender/students/{{ $details->id}}" class="btn btn-default">Add Calender</a>
                            <a href="/admin/students/add/image/{{ $details->id}}" class="btn btn-default">Additional Image</a>
                          
                     </td>
                    </tr>
                    @endforeach
                    <tr>
                      <td colspan="5" class="text-right"> <a href="/admin/new/students" class="btn btn-default">Add New </a></td>
                   </tr>
                  </tbody>
                </table>
          
          </div>
          
          
          
        
        </div>
     </div> 
  </div>   
@endsection
