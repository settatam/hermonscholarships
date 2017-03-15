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
            ->get();
        return view('admin.students.index', compact ('students'));
    }
	
	 public function create(Request $request)
    {    
		  $month    = $this->month();
		    // $dat = 2006109;
		     //$dt = \Carbon\Carbon::createFromDate($request->year,$request->month,$request->day); 
			       //dd($dt->toDateTimeString());  // 
		  
              if ($request->isMethod('post')) {
				  	
		    	     $student = new Student();
					 
					 $this->validateFile($request);
					 
					 $this->validate($request, [
					   'student_name'        => 'required|max:70',
					   'student_last_name'   => 'required|max:70',
					   'grade'=>'required',
					   'year'=>'required',
					   'month'=>'required',
					   'day'=>'required',
					  // 'description'=>'required'
				    ]);
					 $dt = \Carbon\Carbon::createFromDate($request->year,$request->month,$request->day); 
			      
					 $slug = strtolower($request->student_name.','.$request->student_last_name);
					 //dd($dob);
					 $student->user_id=\Auth::user()->id;
					 $student->date_of_birth=$dt->toDateTimeString();
					 $student->name=$request->student_name;
					 $student->slug = $this->slug($request->student_name,$request->student_last_name);
					 $student->last_name=$request->student_last_name;
					 $student->description='description will be generated dynamically';
					 $student->grade=$request->grade;
					 $student->save();
					 $file = $request->file('file');
					 $image = uniqid().'.'.$file->getClientOriginalExtension();
					 $file->move('images/students',  $image);
					 $photo = new Photo(['student_id'=>$student->id,'photos'=>$image]);
					 $photo->save();
					 return redirect('/admin/students')->with('status', 'Students Details Created');	  
			   }
			    	 
        return view('admin.students.create',compact('month'));
    }
	
	public function slug($val1,$val2) { 
	    $slug=strtolower($val1.','.$val2);
	    $slug=str_replace('.',' ', $slug);
	    $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $slug);
	   
	   return rtrim($slug,'-'); 
	}	
	public  function show(Request $request,$student_id){
		
		   $student = Student::find($student_id);
		   
		   $photo   = Student::find($student_id)->photo;
		  
		   $reports = Student::find($student_id)->reports;
		 
		 
		   return view('admin.students.students',compact('student','reports','photo'));

	} 
	
	public function validateFile(Request $request) { 
	
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
					  
	}

	public  function edit (Request $request, $student_id) {
		
		
			  $student  = Student::find($student_id);
			  $photo    = Student::find($student_id)->photo;
			  $month    = $this->month();
	          if ($request->isMethod('post')) {
			      if( $request->hasFile('file')) {	
		              $this->validateFile($request);
					   $file = $request->file('file');
					  
				      $image = uniqid().'.'.$file->getClientOriginalExtension();
				      $file->move('images/students',  $image);
					  
				      $photo->photos=$image;
				  }else { 
				      $photo->photos=  $request->image_from_database;
			   }
			   $photo->save();   
			   $dt = \Carbon\Carbon::createFromDate($request->year,$request->month,$request->day);  
			   $student->user_id=\Auth::user()->id;
			   $student->date_of_birth=$dt->toDateTimeString();
			   $student->slug = $this->slug($request->student_name,$request->student_last_name);
			   $student->name=$request->student_name;
			   $student->last_name=$request->student_last_name;
			    $student->description='description will be generated dynamically';
			   $student->grade=$request->grade;
			   $student->save();      				  	  
			   
				 
		  return redirect()->back()->with('status', 'Students Details Updated');//reject if we have only on address
	 
				 	
		}
		$dob =  substr($student->date_of_birth, 0, 10);
	    $dob =  explode('-',$dob);
	    return view('admin.students.edit',compact('dob','month','student','student_id','photo'));
 
	}
	
	public function month(){
		
	  return [
		 1=>'jan',
		 2=>'feb',
		 3=>'mar',
		 4=>'apr',
		 5=>'may',
		 6=>'june',
		 7=>'july',
		 8=>'aug',
		 9=>'sep',
		 10=>'oct',
		 11=>'nov',
		 12=>'dec',
		 
	  ];	
	}
	
	public  function remove ( $student_id) { 
	
	        $path = base_path().'/public/images/students';
		    $images_to_delete = Student::find( $student_id);
		   
		   \File::Delete($path.'/'.$images_to_delete->pictures);
	       Student::destroy($student_id);
		   return redirect()->back()->with('status', 'Students Details rEMOVED ');//reject if we have only on address

	}
	
	
}
