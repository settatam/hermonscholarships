@extends('layouts.admin')

@section('content')




  <div class="container">
    
    <div class="row">
      <div class="col-md-3">
       @include('layouts.aside')
       
        </div>
       
       

          <div class="col-md-8">
          <div class="panel panel-primary">
            <h2>Report For  {{ $student->name }}  {{ $student->last_name}}</h2>
            @include('layouts.success')
                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                {{csrf_field()}}
        <fieldset id="form">
          <legend></legend>
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-title">Title</label>
            <div class="col-sm-10">
              <input type="text"  required="required" name="title" value="" placeholder="Tilte" id="input-tile" class="form-control" />
                          </div>
          </div>
        
          
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-postcode">Description</label>
            <div class="col-sm-10">
              <textarea  name="description" required="required"  class="form-control" ></textarea>
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
  <script type="text/javascript">
    var route_row = 1;

/*function addForm() {
	html  = '  <div id="route-row'+ route_row +'"><hr/><legend>Students Details</legend>';
	html += '  <div class="form-group required"> <label class="col-sm-2 control-label" for="input-firstname">First Name</label>';
	html += '  <div class="col-sm-10">';
	html += '  <input type="text" name="name[]" value="" placeholder="First Name" id="input-firstname" class="form-control" />';
	html += '  </div>';
	html += '  </div>';
	
	html += '  <div class="form-group required"> <label class="col-sm-2 control-label" for="input-firstname">Last Name</label>';
	html += '  <div class="col-sm-10">';
	html += '  <input type="text" name="last_name[]" value="" placeholder="Last Name" id="input-lastname" class="form-control" />';
	html += '  </div>';
	html += '  </div>';
	
	html += '  <div class="form-group required"> <label class="col-sm-2 control-label" for="input-grade">Grade</label>';
	html += '  <div class="col-sm-10">';
	html += '   <select style="width:100%;"  class="form-control" name="total"  tabindex="1" >';
	html += '  <option value="kindergarten">Kindergarten</option>';
	html += '   <option value="Nursery 1">Nursery 1</option>';
	html += '  <option value="Nursery 2">Nursery 2</option>';
	html += '  <option value="Primary 2">Primary 1</option>';
	html += '  <option value="Primary 2">Primary 2</option>';
	
	html += '  <option value="Primary 3">Primary 3</option>';
	html += '   <option value="Primary 4">Primary 4</option>';
	html += '  <option value="Primary 5">Primary 5</option>';
	html += '   </select>';
	html += '  </div>';
	html += '  </div>';
	
	html += '  <div class="form-group required"> <label class="col-sm-2 control-label" for="input-file">Image</label>';
	html += '  <div class="col-sm-10">';
	html += '  <input type="file" name="file[]"  class="form-control" />';
	html += '  </div>';
	html += '  </div>';
    
	
	html += '  <div class="form-group required"> <label class="col-sm-2 control-label" for="input-amount">Amount</label>';
	html += '  <div class="col-sm-10">';
	html += '  <input type="text" name="amount[]"  class="form-control" />';
	html += '  </div>';
	html += '  </div>';
	   
	html += '  <div class="form-group required"> <label class="col-sm-2 control-label" for="input-description">Description</label>';
	html += '  <div class="col-sm-10">';
	html += ' <textarea  name="description"  class="form-control" ></textarea>';
	html += '  </div>';
	html += '  </div><a onclick="$(\'#route-row' + route_row  + '\').remove();"  href="javascript:void(0)" class="btn btn-default">Remove</a>&nbsp;&nbsp;</div>';
	
	$('fieldset#form').append(html);
	
	route_row++;
}*/
  
  
  </script>  
@endsection
