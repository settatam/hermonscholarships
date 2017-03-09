@extends('layouts.admin')

@section('content')




  <div class="container">
    
    <div class="row">
      <div class="col-md-3">
       @include('layouts.aside')
       
        </div>
       
        <div class="col-md-4 col-sm-6 col-xs-12">
          <a href="#" class="small-box-footer">
          <div class="info-box">
             <a href="#" class="small-box-footer">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Users</span>
              <span class="info-box-number">{{$number_of_users}}</span>
            </div>
            <!-- /.info-box-content -->
          
          </div>
          </a>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-4 col-sm-6 col-xs-12">
          <a href="#" class="small-box-footer">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Students</span>
              <span class="info-box-number">{{$number_of_students}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          </a>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

            
      
      
        
     </div> 
  </div>   
@endsection
