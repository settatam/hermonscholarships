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
              <span class="info-box-number">90</span>
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

            
      
      <!-- /.<!--<div class="col-md-8">
          <div class="panel panel-primary">
            <h2>Bordered Table</h2>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Firstname</th>
                      <th>Lastname</th>
                      <th>Email</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>John</td>
                      <td>Doe</td>
                      <td>john@example.com</td>
                    </tr>
                    <tr>
                      <td>Mary</td>
                      <td>Moe</td>
                      <td>mary@example.com</td>
                    </tr>
                    <tr>
                      <td>July</td>
                      <td>Dooley</td>
                      <td>july@example.com</td>
                    </tr>
                  </tbody>
                </table>
          
          </div>
        
        </div>-->
        
     </div> 
  </div>   
@endsection
