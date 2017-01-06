@extends('layouts.app')

@section('content')





    <div class="container">
    
    <div class="row">   
    
  @include('layouts.nav')
          <div id="content" class="col-sm-9">   
                 
                    <h1>Change Password</h1>
      <form action="edit" method="post" enctype="multipart/form-data" class="form-horizontal">
        <fieldset>
          <legend>Your Password</legend>
         <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-password">Password</label>
            <div class="col-sm-10">
              <input type="password" name="password" value="" placeholder="Password" id="input-password" class="form-control" />
                          </div>
          </div>
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-confirm">Password Confirm</label>
            <div class="col-sm-10">
              <input type="password" name="confirm" value="" placeholder="Password Confirm" id="input-confirm" class="form-control" />
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
