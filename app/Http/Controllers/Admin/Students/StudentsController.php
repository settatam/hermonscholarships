<?php

namespace App\Http\Controllers\Admin\Students;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;



use App\Student;

use App\Guardian;

use App\Photo;


class StudentsController extends Controller {
	
	
	public function __construct ( ) { 
	         
			 
	   $this->middleware('checkAccess');

	} 

  
  
   public function index()
    {    
	
	    $number_of_students = $this->number_of_students();
		
		 $students = \DB::table('students')
            ->join('photos', 'students.id', '=', 'photos.student_id')
            ->select('students.*', 'photos.photos')
            ->paginate(15);
		
        return view('admin.students.index', compact ('number_of_students','students'));
    }
	
	 public function create(Request $request)
    {    
		 $number_of_students = $this->number_of_students();
		 
              if ($request->isMethod('post')) {	
	                
		    	    $student = new Student();
					
					 $this->validate($request, [
					   'student_name'           => 'required|max:30',
					   'student_last_name'      => 'required|max:30',
					   'grade'=>'required',
					   'file' => 'mimes:jpeg,png',
					   'description'=>'required'
				    ]);
					     
					 $student->user_id=\Auth::user()->id;
					 $student->parent_id=null;//tempral solution
					 $student->amount=3000;//tempral solution
					 $student->date_of_birth='today';//tempral solution
					 $student->name=$request->student_name;
					 $student->last_name=$request->student_last_name;
					 $student->description=$request->description;
					 $student->grade=$request->grade;
					 $student->save();
					                     
					 $files = $request->file('file');

				     $files->move('images/students', $files->getClientOriginalName());
					
					 $photo = new Photo(['student_id'=>$student->id,'photos'=>$files->getClientOriginalName()]);
					 
					 $photo->save();
					 
				    return redirect('/admin/students')->with('status', 'Students Details Created');//reject if we have only on addres	  
			   }
			    
				 
        return view('admin.students.create',compact('number_of_students'));
    }
	
		
	public  function show(Request $request,$student_id){
		
		   $student = Student::find($student_id);
		   
		   $photo   = Student::find($student_id)->photo;
		  
		   $reports = Student::find($student_id)->reports;
		 
		   $number_of_students = $this->number_of_students();
		 
		   return view('admin.students.students',compact('number_of_students','student','reports','photo'));

	} 

	public  function edit (Request $request, $student_id) {
		
		
		$student  = Student::find($student_id);
		$guardian = Guardian::find($student->parent_id);
		$number_of_students = $this->number_of_students();
	    $photo   = Student::find($student_id)->photo;

	    if ($request->isMethod('post')) {	
	       
		        
			   $files = $request->file('file');
		   
			   if ( $files ) {  
				  $photo->photos=$files->getClientOriginalName();
				  $files->move('images/students', $files->getClientOriginalName());
			   } else { 
				   $photo->photos=  $request->image_from_database;

			   }
			   $photo->save();   
			   $student->user_id=\Auth::user()->id;
			   $student->parent_id=null;//tempral solution
			   $student->amount=3000;//tempral solution
			   $student->date_of_birth='today';//tempral solution
			   $student->name=$request->student_name;
			   $student->last_name=$request->student_last_name;
			   $student->description=$request->description;
			   $student->grade=$request->grade;
			   $student->save();      				  	  
			   
				 
		  return redirect()->back()->with('status', 'Students Details Updated');//reject if we have only on address
	 
				 	
		}
	   
	    return view('admin.students.edit',compact('number_of_students','student','guardian','student_id','photo'));
 
	}
	public  function number_of_students ( ) { 
	   $count = Student::count();
	   return count (  $count  )  ? $count : '';
	}
	
	public  function remove ( $student_id) { 
	
	        $path = base_path().'/public/images/students';
			
		
		    $images_to_delete = Student::find( $student_id);
		   
		   
		     
		     \File::Delete($path.'/'.$images_to_delete->pictures);
			 
		  
	       Student::destroy($student_id);
		   return redirect()->back()->with('status', 'Students Details rEMOVED ');//reject if we have only on address

	}
	
	
}
