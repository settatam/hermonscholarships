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
                <form action=" /admin/edit/students/{{$student_id}} " method="post" enctype="multipart/form-data" class="form-horizontal">
                {{csrf_field()}}
        <fieldset id="form">
         
            <legend>Students Details</legend>
          
            <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-firstname">First Name</label>
            <div class="col-sm-10">
              <input type="text" name="student_name" value="{{  !empty($student->name) ?  $student->name : ''    }}" required="required" placeholder="First Name" id="input-firstname" class="form-control" />
                          </div>
          </div>
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-lastname">Last Name</label>
            <div class="col-sm-10">
              <input type="text" name="student_last_name" required="required" value="{{  !empty($student->last_name) ?  $student->last_name : ''    }}" placeholder="Last Name" id="input-lastname" class="form-control" />
                          </div>
          </div>
           <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-grade">Grade</label>
              <div class="col-sm-10">
               <select style="width:100%;" required="required"  class="form-control" name="grade"  tabindex="1" >
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
            
            <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-date">Date Of Birth</label>
            <div class="col-sm-10">
              <input type="date" name="date_of_birth" required="required" value="{{  !empty($student->date_of_birth) ?  $student->date_of_birth : ''    }}" placeholder="Date of Birth" id="input-date" class="form-control" />
                          </div>
          </div>
          
           <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-time">Time Frame</label>
            <div class="col-sm-10">
              <input type="text" name="timeframe" required="required" value="{{  !empty($student->timeframe) ?  $student->timeframe : ''    }}" placeholder="Months ,Years,Days to finish school" id="input-time" class="form-control" />
                          </div>
          </div>
            @if ( count( $student))
                <div class="row ">
                <div class="col-xs-6  col-md-4 col-md-offset-3">
                  <a href="#" class="thumbnail">
                    <img src="/images/students/{{$photo->photos}}" alt="...">
                  </a>
                </div>
 
                </div>
              @endif 
             <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-file">Image</label>
              
            <div class="col-sm-10">
              <input type="file" name="file"  class="form-control" />
              <input type="hidden" name="image_from_database" required="required" value="{{ !empty($photo->photos) ?  $photo->photos : ''    }}" placeholder="Last Name" id="input-lastname" class="form-control" />

            </div>
          </div>
         
          <div class="form-group required">
            <label class="col-sm-2 control-label" for="input-postcode">Description</label>
            <div class="col-sm-10">
              <textarea  name="description" required="required"  class="form-control" >{{ !empty($student->description) ?  $student->description : ''    }}</textarea>
            </div>
          </div>
          
         
          
          
                  </fieldset>
        <div class="buttons clearfix">
          <div class="pull-left"><a  href="/admin/students" class="btn btn-default">BACK</a></div>
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
   
  
  </script>  
@endsection
