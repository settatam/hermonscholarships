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
                <form action="{{ isset($student) ? '/admin/edit/students/'.$student_id : '/admin/new/students' }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                {{csrf_field()}}
        <fieldset id="form">
          <legend>Guardian Details</legend>
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-firstname">First Name</label>
            <div class="col-sm-10">
              <input type="text"  required="required" name="name" value="{{ !empty($guardian->name) ?  $guardian->name : old('name')    }}" placeholder="First Name" id="input-firstname" class="form-control" />
                          </div>
          </div>
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-lastname">Last Name</label>
            <div class="col-sm-10">
              <input type="text"  required="required" name="last_name" value="{{  !empty($guardian->last_name) ?  $guardian->last_name : old('last_name')    }}" placeholder="Last Name" id="input-lastname" class="form-control" />
                          </div>
          </div>
          
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-postcode">Phone</label>
            <div class="col-sm-10">
              <input type="text"  required="required" name="phone" value="{{  !empty($guardian->phone) ?  $guardian->phone : old('phone')    }}" placeholder="Phone" id="input-postcode" class="form-control" />
                          </div>
          </div>
        
          <div class="form-group required">
              <label class="col-sm-2 control-label" for="input-address-1">Address 1</label>
              <div class="col-sm-10">
                <input type="text"  required="required" name="address" value="{{  !empty($guardian->address) ?  $guardian->address : old('address')    }}" placeholder="Address 1" id="input-address-1" class="form-control" />
              </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label" for="input-address-2">Address 2</label>
            <div class="col-sm-10">
              <input type="text"   name="address_2" value="{{ !empty($guardian->address_2) ?  $guardian->address_2 : old('address_2')    }}" placeholder="Address 2" id="input-address-2" class="form-control" />
            </div>
          </div>
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-city">City</label>
            <div class="col-sm-10">
              <input type="text"  required="required" name="city" value="{{!empty($guardian->city) ?  $guardian->city : old('city')    }}" placeholder="City" id="input-city" class="form-control" />
                          </div>
          </div>
         
          
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-postcode">Job Description</label>
            <div class="col-sm-10">
              <input type="job" name="job" value="{{ !empty( $guardian->job) ?  $guardian->job : old('job')    }}" placeholder="job" id="input-job" class="form-control" />
                          </div>
          </div>
          
           <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-salary">Salary Range</label>
            <div class="col-sm-10">
              <input type="text" name="salary" value="{{  !empty($guardian->salary_range) ?  $guardian->salary_range : old('salary_range')    }}" placeholder="salary" id="input-salary" class="form-control" />
                          </div>
          </div>
          <hr/>
            <legend>Students Details</legend>
          
            <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-firstname">First Name</label>
            <div class="col-sm-10">
              <input type="text" name="student_name[]" value="{{  !empty($student->name) ?  $student->name : ''    }}" required="required" placeholder="First Name" id="input-firstname" class="form-control" />
                          </div>
          </div>
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-lastname">Last Name</label>
            <div class="col-sm-10">
              <input type="text" name="student_last_name[]" required="required" value="{{  !empty($student->last_name) ?  $student->last_name : ''    }}" placeholder="Last Name" id="input-lastname" class="form-control" />
                          </div>
          </div>
           <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-lastname">Grade</label>
              <div class="col-sm-10">
               <select style="width:100%;" required="required"  class="form-control" name="grade[]"  tabindex="1" >
                  <option value="">Choose</option>
                   <option  {{ !empty($student->grade)  && $student->grade == 'kindergarten'?  'selected' : ''    }} value="kindergarten">Kindergarten</option>
                    <option {{ !empty($student->grade)  && $student->grade == 'Nursery 1'?  'selected' : ''    }} value="Nursery 1">Nursery 1</option>
                    <option {{ !empty($student->grade)  && $student->grade == 'Nursery 2'?  'selected' : ''    }} value="Nursery 2">Nursery 2</option>
                    <option {{ !empty( $student->grade)  && $student->grade == 'Primary 1'?  'selected' : ''    }} value="Primary 2">Primary 1</option>
                    <option {{ !empty($student->grade)  && $student->grade == 'Primary 2'?  'selected' : ''    }} value="Primary 2">Primary 2</option>
                    <option {{ !empty($student->grade)  && $student->grade == 'Primary 3'?  'selected' : ''    }} value="Primary 3">Primary 3</option>
                    <option {{ !empty($student->grade)  && $student->grade == 'Primary 4'?  'selected' : ''    }} value="Primary 4">Primary 4</option>
                    <option {{ !empty($student->grade)  && $student->grade == 'Primary 5'?  'selected' : ''    }} value="Primary 5">Primary 5</option>
              </select>
              </div>
            </div>
            @if ( count( $student))
                <div class="row ">
                <div class="col-xs-6  col-md-4 col-md-offset-3">
                  <a href="#" class="thumbnail">
                    <img src="/images/students/{{$student->pictures}}" alt="...">
                  </a>
                </div>
 
                </div>
              @endif 
             <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-file">Image</label>
              
            <div class="col-sm-10">
              <input type="file" name="file[]" required="required" class="form-control" />
              <input type="hidden" name="image_from_database[]" required="required" value="{{ !empty($student->last_name) ?  $student->last_name : ''    }}" placeholder="Last Name" id="input-lastname" class="form-control" />

            </div>
          </div>
           <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-amount">Amount</label>
            <div class="col-sm-10">
              <input type="text" name="amount[]" value="{{!empty( $student->amount) ?  $student->amount : ''    }}" required="required" class="form-control" />
            </div>
          </div>
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-postcode">Description</label>
            <div class="col-sm-10">
              <textarea  name="description[]" required="required"  class="form-control" >{{ !empty($student->description) ?  $student->description : ''    }}</textarea>
            </div>
          </div>
          
         
          
          
                  </fieldset>
        <div class="buttons clearfix">
          @if ( !isset($student) )
          <div class="pull-left"><a onclick="addForm()" href="javascript:void(0)" class="btn btn-default">Add</a></div>
          @endif
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

function addForm() {
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
}
  
  
  </script>  
@endsection
