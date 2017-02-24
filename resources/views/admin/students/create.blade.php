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
            @include('layouts.success')
            @include('errors.errors')
                <form action="/admin/new/students" method="post" enctype="multipart/form-data" class="form-horizontal">
                {{csrf_field()}}
             <fieldset id="form">
          
            <legend>Students Details</legend>
          
            <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-firstname">First Name</label>
            <div class="col-sm-10">
              <input type="text" name="student_name" value="" required="required" placeholder="First Name" id="input-firstname" class="form-control" />
                          </div>
          </div>
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-lastname">Last Name</label>
            <div class="col-sm-10">
              <input type="text" name="student_last_name" required="required" value="" placeholder="Last Name" id="input-lastname" class="form-control" />
                          </div>
          </div>
          
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-date">Date Of Birth</label>
            <div class="col-sm-10">
              <input type="date" name="date_of_birth" required="required" value="" placeholder="Date of Birth" id="input-date" class="form-control" />
                          </div>
          </div>
          
           <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-time">Time Frame</label>
            <div class="col-sm-10">
              <input type="text" name="timeframe" required="required" value="" placeholder="Months ,Years,Days to finish school" id="input-time" class="form-control" />
                          </div>
          </div>
           <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-lastname">Grade</label>
              <div class="col-sm-10">
               <select style="width:100%;" required="required"  class="form-control" name="grade"  tabindex="1" >
                  <option value="">Choose</option>
                   <option   value="kindergarten">Kindergarten</option>
                    <option  value="Nursery 1">Nursery 1</option>
                    <option  value="Nursery 2">Nursery 2</option>
                    <option  value="Primary 2">Primary 1</option>
                    <option  value="Primary 2">Primary 2</option>
                    <option  value="Primary 3">Primary 3</option>
                    <option  value="Primary 4">Primary 4</option>
                    <option  value="Primary 5">Primary 5</option>
              </select>
              </div>
            </div>
           
             
          
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-postcode">Description</label>
            <div class="col-sm-10">
              <textarea  name="description" required="required"  class="form-control" ></textarea>
            </div>
          </div>
          
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-file">Image</label>
              
            <div class="col-sm-10">
              <input type="file" name="file" required="required" class="form-control" />

            </div>
          </div>
          
    
                  </fieldset>
                  
             
        <div class="buttons clearfix">
          <div class="pull-left"><a  href="/admin/students" class="btn btn-default">Back</a></div>
          <div class="pull-right">
            <input type="submit" value="Save" class="btn btn-primary" />
          </div>
          
        </div>
      </form>
          
          </div>
        
        </div>
     </div> 
  </div> 
  <script type="text/javascript">
   
    var route_row = 1;

function addImage() {
	html  = '<tr id="route-row' + route_row + '">';
	html += '<td class="text-left"><input type="file" name="additional_image[]" required="required" class="form-control" /></td>';
	html += '<td class="text-left"><button type="button" onclick="$(\'#route-row' + route_row + '\').remove();" data-toggle="tooltip" title="Remove" class="btn btn-danger"><i class="fa fa-minus-circle"></i></button></td>';
	html += '</tr>';
	
	$('#route tbody').append(html);
	
	route_row++;
}
  </script>  
@endsection
