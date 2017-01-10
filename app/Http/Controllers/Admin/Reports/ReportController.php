<?php

namespace App\Http\Controllers\Admin\Reports;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Student;

use App\Report;


class ReportController extends Controller {
	
	
	public function __construct ( ) { 
	         
			 
	   $this->middleware('checkAccess');

	} 

  
  
   public function index()
    {    
	
	   
    }
	
	 public function create(Request $request,$student_id)
    {  
	    
		$student  = Student::find($student_id);
	    $number_of_students = Student::count();
		
	   if ($request->isMethod('post')) {
		   
		         $report          = new Report;
				 $report->title    = $request->title;
				 $report->student_id   = $student_id;
				 $report->description  = $request->description;
				 $report->save();
		   return redirect()->back()->with('status', 'Reports Created');//reject if we have only on address

		  }

		
	   return view('admin.reports.create',compact ('number_of_students','student'));

    }
	
	public  function delete ( $report_id) { 
	      Report::destroy($report_id);
		  return redirect()->back()->with('status', 'Report REMOVED ');//reject if we have only on address

	}
	
}