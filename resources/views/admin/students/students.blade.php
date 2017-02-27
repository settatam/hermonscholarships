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
                    <td><img width="100" height="100" src="/images/students/{{$photo->photos }}"  /></td>
                  </tr>
                  <tr>
                    <td>Full Name</td>
                    <td>{{$student->fullname()}} </td>
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
                    <td>Age</td>
                    <td>{{$student->date_of_birth}}</td>
                  </tr>
                  <tr>
                    <td>Timeframe</td>
                    <td>{{$student->timeframe}}</td>
                  </tr>
                </tbody>
              </table>
            </div>
       
            
          </div>
        
        </div>
     </div> 
  </div>   
@endsection
