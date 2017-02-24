<?php

namespace App\Http\Controllers\Admin\Calender;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Student;
use App\SchoolCalender;


class CalenderController extends Controller {
	
	
	public function __construct ( ) { 
	         
			 
	   $this->middleware('checkAccess');

	} 

  
  
   public function index($student_id)
    {    
	  $student  = Student::find($student_id);
	  $calender =  Student::find($student_id)->calender;
	  return view('admin.calender.index',compact('student_id','calender','student'));
    }
	
	 public function create(Request $request,$student_id)
    {  
		$student  = Student::find($student_id);
		
	   if ($request->isMethod('post')) {
		   
		     $this->validate($request, [
			   'title'        => 'required|min:3',
			   'description'   => 'required|max:300',
			   
			 ]);
			 $calender               = new SchoolCalender;
			 $calender->title        = $request->title;
			 $calender->student_id   = $student_id;
			 $calender->description  = $request->description;
			 $calender->save();
		     return redirect('/admin/calender/'.$student_id)->with('status', 'calenders Created');//reject if we have only on address

		 }
		 
		  $calender =  Student::find($student_id)->calender;
		  
		  
	      return view('admin.calender.create',compact('calender','student'));

    }
	
	public  function delete ( $calender_id) { 
	      SchoolCalender::destroy($calender_id);
		  return redirect()->back()->with('status', 'calender removed ');//reject if we have only on address

	}
	
}