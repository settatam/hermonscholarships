<?php

namespace App\Http\Controllers\Admin\Students;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;



use App\Student;

use App\Guardian;

use App\Photo;


class StudentsController extends Controller {


	public function __construct ( ) {


	   //$this->middleware('checkAccess');

	}



   public function index()
    {

	    $number_of_students = $this->number_of_students();


				$students = Student::paginate(15);

	
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

		    //persist to database
			     $parent                                = new Guardian;
				 $parent->name                          = $request->name;
				 $parent->last_name                     = $request->last_name;
				 $parent->phone                         = $request->phone;
				 $parent->address                       = $request->address;
				 $parent->address_2                     = $request->address_2;
				 $parent->city                          = $request->city ;
				 $parent->state                         = $request->city ;
				 $parent->job                           = $request->job;
				 $parent->salary_range 	                = $request->salary;
				 $parent->save();

				  $files = $request->file('file');

				 for ($i = 0; $i < count($request->name); $i++){

				    $insert = [ 'parent_id'=> $parent->id,
					            'user_id'=>\Auth::user()->id,
								'name'=>$request->student_name[$i],
								'last_name'=>$request->student_last_name[$i],
								'description'=>$request->description[$i],
								'grade'=>$request->grade[$i],
								'pictures'=>$files[$i]->getClientOriginalName(),
								'amount'=>$request->amount[$i]
					           ];
		    	    Student::Insert($insert);

				    $files[$i]->move('images/students', $files[$i]->getClientOriginalName());

			   }



		  return redirect('/admin/students')->with('status', 'Students Details Created');//reject if we have only on address


		}

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

	   $reports = Student::find($student_id)->reports;

	  $number_of_students = $this->number_of_students();

	  return view('admin.students.students',compact('number_of_students','student','reports'));

		
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

	    if ($request->isMethod('post')) {

		         //persist to database
				 $guardian->name                          = !empty( $request->name ) ? $request->name : $guardian->name;
				 $guardian->last_name                     = !empty( $request->last_name ) ? $request->last_name : $guardian->name;
				 $guardian->phone                         = !empty( $request->phone ) ? $request->phone : $guardian->phone;
				 $guardian->address                       = !empty( $request->address ) ? $request->address  : $guardian->address;
				 $guardian->address_2                     = !empty( $request->address_2 ) ? $request->address_2 : $guardian->address;
				 $guardian->city                          = !empty( $request->city ) ? $request->city : $guardian->address;
				 $guardian->state                         = !empty( $request->state ) ? $request->state :  $guardian->state;
				 $guardian->job                           = !empty( $request->job ) ?   $request->job  : $guardian->job;
				 $guardian->salary_range 	              = !empty( $request->salary 	 ) ?   $request->salary : $guardian->salary_range;
				 $guardian->save();

				     $files = $request->file('file');

				     if ( $files ) {
					   	$student->pictures=$files[0]->getClientOriginalName();
						$files[0]->move('images/students', $files[0]->getClientOriginalName());
					 } else {
					    $student->pictures=  $request->image_from_database[0];

					 }
					$student->parent_id =  $guardian->id;
					$student->user_id=\Auth::user()->id;
					$student->name=$request->student_name[0];
					$student->last_name=$request->student_last_name[0];
					$student->description=$request->description[0];
					$student->grade=$request->grade[0];
					$student->amount=$request->amount[0];
					$student->save();



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
			   $student->name=$request->student_name;
			   $student->last_name=$request->student_last_name;
			   $student->description=$request->description;
			   $student->grade=$request->grade;
			   $student->save();      				  	  
			   
				 

		  return redirect()->back()->with('status', 'Students Details Updated');//reject if we have only on address


		}


	    return view('admin.students.create',compact('number_of_students','student','guardian','student_id'));


	   
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
