@extends('layouts.admin')

@section('content')




  <div class="container">
    
    <div class="row">
      <div class="col-md-3">
       @include('layouts.aside')
       
        </div>
       
       

          <div class="col-md-8">
          <div class="panel panel-primary">
            <h3>Additional Images For  {{ $student->fullname()}}</h3>
            @include('layouts.success')
                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                {{csrf_field()}}
        <fieldset id="form">
          <legend></legend>
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-title">Title</label>
            <div class="col-sm-10">
              <input type="file"  required="required" name="additional_image" value="" placeholder="Tilte" id="input-tile" class="form-control" />
            </div>
          </div>
        
          
         
          
          
                  </fieldset>
        <div class="buttons clearfix">
         
          <div class="pull-right">
            <input type="submit" value="Continue" class="btn btn-primary" />
          </div>
        </div>
      </form>
          
          </div>
        
        </div>
     </div> 
  </div> 
  
@endsection
