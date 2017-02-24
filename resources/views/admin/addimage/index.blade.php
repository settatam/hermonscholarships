@extends('layouts.admin')

@section('content')




  <div class="container">
    
    <div class="row">
      <div class="col-md-3">
         @include('layouts.aside')
       
        </div>
       
          <div class="col-md-8">
          <div class="panel panel-primary">
            <h2>Additional Images For {{ $student->fullname()}}</h2>
              @include('layouts.success')
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Title</th>
                      <th class="text-left">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  
                   @if(count($add_images))
                     @foreach($add_images as $details)
                        <tr>
                          <td><img width="100" height="100" src="/images/students/additionalimages/{{$details->images}}" ></td>
                          <td class="text-right"><a href="/admin/delete/addimage/{{$details->id}}" class="btn btn-default">Delete</a></td>
                        </tr>
                        
                     @endforeach
                    @else
                         <tr>
                          <td>No Data</td>
                         </tr>
                    
                    @endif
                    <tr>
                      <td colspan="5" class="text-right">  <a href="/admin/students/add/new/image/{{$student_id}}" class="btn btn-default">Add Image</a></td>
                   </tr>
                  </tbody>
                </table>
          
          </div>
          
          
          
        
        </div>
     </div> 
  </div>   
@endsection
