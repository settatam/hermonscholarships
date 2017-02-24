<?php 

namespace App\Http\Controllers\Admin\Students;
ini_set('memory_limit', '-1');
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Student;
use App\Photo;
use App\AdditionalImage;


class StudentsController extends Controller {
	
	
	public function __construct ( ) { 
	         
			 
	   $this->middleware('checkAccess');

	} 

  
  
   public function index()
    {    
	
		
		 $students = \DB::table('students')
            ->join('photos', 'students.id', '=', 'photos.student_id')
            ->select('students.*', 'photos.photos')
            ->paginate(15);
		
        return view('admin.students.index', compact ('students'));
    }
	
	 public function create(Request $request)
    {    
		 $number_of_students = $this->number_of_students();
		 
              if ($request->isMethod('post')) {	
	                
		    	    $student = new Student();
					
					 //CHECK IF IS AJAX JUST FOR VALIDATING FILE
		    
					 $file = $request->file('file');
					 
					 
					 // Build the input for validation
					  $fileArray = array('image' => $file);
				  
					  // Tell the validator that this file should be an image
					  $rules = array(
						'image' => "mimes:jpeg,jpg,png,gif|required|max:3000"
					  );
				  
					  // Now pass the input and rules into the validator
					  $validator = \Validator::make($fileArray, $rules);
					 
					   if ($validator->fails()) {
						  return \Redirect::back()
										  ->withErrors($validator)
										  ->withInput();
					   }
				  
					 
					 
					
					 $this->validate($request, [
					   'student_name'        => 'required|max:30',
					   'student_last_name'   => 'required|max:30',
					   'grade'=>'required',
					   'date_of_birth'=>'required',
					   'description'=>'required'
				    ]);
					    
					 $student->user_id=\Auth::user()->id;
					 $student->date_of_birth=$request->date_of_birth;//tempral solution
					 $student->name=$request->student_name;
					 $student->timeframe = $request->timeframe;
					 $student->last_name=$request->student_last_name;
					 $student->description=$request->description;
					 $student->grade=$request->grade;
					 $student->save();
					                     
					 
					  $image = uniqid().'.'.$file->getClientOriginalExtension();

				      $file->move('images/students',  $image);
					 
					 // create new Intervention Image
					  $img = \Image::make('images/students/'.$image);
					  
					  // paste another image
					  $img->insert('images/students/hemon.jpg', 'bottom-right', 20, 20);
					 
					 //save
					  $img->save('images/students/'.$image);
					 
					  $photo = new Photo(['student_id'=>$student->id,'photos'=>$image]);
					 
					  $photo->save();
					 
					 
					 
				    return redirect('/admin/students')->with('status', 'Students Details Created');	  
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
		$number_of_students = $this->number_of_students();
	    $photo   = Student::find($student_id)->photo;

	    if ($request->isMethod('post')) {	
	       
		        
			  
		   
			   if ( $files ) {
				   
				   //CHECK IF IS AJAX JUST FOR VALIDATING FILE
		    
					 $file = $request->file('file');
					 
					 
					 // Build the input for validation
					  $fileArray = array('image' => $file);
				  
					  // Tell the validator that this file should be an image
					  $rules = array(
						'image' => "mimes:jpeg,jpg,png,gif|required|max:3000"
					  );
				  
					  // Now pass the input and rules into the validator
					  $validator = \Validator::make($fileArray, $rules);
					 
					   if ($validator->fails()) {
						  return \Redirect::back()
										  ->withErrors($validator)
										  ->withInput();
					   }
				    
				      $image = uniqid().'.'.$file->getClientOriginalExtension();

				      $file->move('images/students',  $image);
					 
					 // create new Intervention Image
					  $img = \Image::make('images/students/'.$image);
					  
					  // paste another image
					  $img->insert('images/students/hermon.jpg', 'bottom-right', 10, 10);
					 
					 //save
					  $img->save('images/students/'.$image);
			   } else { 
				   $photo->photos=  $request->image_from_database;

			   }
			   $photo->save();   
			   $student->user_id=\Auth::user()->id;
			   $student->date_of_birth=$request->date_of_birth;//tempral solution
			   $student->name=$request->student_name;
			   $student->timeframe = $request->timeframe;
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
