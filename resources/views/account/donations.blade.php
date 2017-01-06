@extends('layouts.app')

@section('content')





    <div class="container">
    
    <div class="row">   
    
     @include('layouts.nav')

          <div id="content" class="col-sm-9">   
                 
                    <h1>My Account Information</h1>
     <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <td class="text-center">Image</td>
              <td class="text-left"> Name</td>
              
              <td class="text-right">Your Donation</td>
              <td class="text-right">Action</td>
            </tr>
          </thead>
          <tbody>
                        <tr>
              <td class="text-center">                <a href=""><img src="http://localhost/open/upload/image/cache/catalog/demo/imac_1-47x47.jpg" alt="iMac" title="iMac" /></a>
                </td>
          
              <td class="text-right">BLAH</td>
              <td class="text-right">                <div class="price">
                                    $100.00                                  </div>
                </td>
              <td class="text-right">
                <a href="" data-toggle="tooltip" title="Remove" class="btn btn-danger">VIEW REPORT</a></td>
            </tr>
                      </tbody>
        </table>
      </div>
    
</div>
      
   </div> 
   
     
   
@endsection
