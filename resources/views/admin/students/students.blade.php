@extends('layouts.admin')

@section('content')




  <div class="container">
    
    <div class="row">
      <div class="col-md-3">
       @include('layouts.aside')
       
       
        </div>
       
       

          <div class="col-md-8">
          <div class="panel panel-primary">
            <h2>Students</h2>
                      <div class="table-responsive">
              <table class="table table-bordered">
              
                <tbody>
                 <tr>
                    <td>Image</td>
                    <td><img width="100" height="100" src="/images/students/{{$student->pictures }}"  /></td>
                  </tr>
                  <tr>
                    <td>Full Name</td>
                    <td>{{$student->name}} {{$student->last_name}}  </td>
                  </tr>
                  <tr>
                    <td>Name of Guardian</td>
                    <td>---  </td>
                  </tr>
                                    <tr>
                    <td>Grade</td>
                    <td>{{$student->grade}}</td>
                  </tr>
                  <tr>
                    <td>Description</td>
                    <td>{{$student->description}} </td>
                  </tr>
                  
                  <tr>
                    <td>Amount Raised</td>
                    <td>-- </td>
                  </tr>
                  <tr>
                    <td>Sponsors</td>
                    <td>-- </td>
                  </tr>
                </tbody>
              </table>
            </div>
       
             <h2>Reports</h2>
                @if (count($reports)  )  
          <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <td >Title</td>
                    <td >Description</td>
                     <td>Action</td>
                  </tr>
                </thead>
                <tbody>
                @foreach($reports as $details )
                  <tr>
                    <td>{{ $details->title}}</td>
                    <td>{{ $details->description}}</td>
                    <td><a href="/admin/delete/reports/{{$details->id}}">Delete</a></td>
                  </tr>
                @endforeach 
                </tbody>
              </table>
            </div>
          @else
          
           No Reports Yet
          @endif
          </div>
        
        </div>
     </div> 
  </div>   
@endsection
