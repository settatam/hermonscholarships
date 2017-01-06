@extends('layouts.app')

@section('content')





    <div class="container">
    
    <div class="row">   
    
     @include('layouts.nav')

          <div id="content" class="col-sm-9">   
                 
                    <h1>My Account Information</h1>
      <form action="edit" method="post" enctype="multipart/form-data" class="form-horizontal">
        <fieldset>
          <legend>Your Personal Details</legend>
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-firstname">Full Name </label>
            <div class="col-sm-10">
              <input type="text" name="firstname" value="Atam Emmanuela" placeholder="First Name" id="input-firstname" class="form-control" />
                          </div>
          </div>
        
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-email">E-Mail</label>
            <div class="col-sm-10">
              <input type="email" name="email" value="jacob.atam@gmail.co" placeholder="E-Mail" id="input-email" class="form-control" />
                          </div>
          </div>
         
         
                  </fieldset>
        <div class="buttons clearfix">
          <div class="pull-left"><a href="/account" class="btn btn-default">Back</a></div>
          <div class="pull-right">
            <input type="submit" value="Continue" class="btn btn-primary" />
          </div>
        </div>
      </form>
      </div>
    
</div>
      
   </div> 
   
     
   
@endsection
