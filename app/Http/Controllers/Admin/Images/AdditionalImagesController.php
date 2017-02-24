<?php

namespace App\Http\Controllers\Admin\Images;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Student;
use App\AdditionalImage;

class AdditionalImagesController extends Controller
{
    //
	
	
	public function index($student_id)
    {    
	  $student  = Student::find($student_id);
	  $add_images =Student::find($student_id)->additional_images;
	  return view('admin.addimage.index',compact('student','add_images','student_id'));
    }
	
	
	public function create(Request $request,$student_id)
    {    
	
	 	   $student  = Student::find($student_id);

	     if ($request->isMethod('post')) {	
		 
			  $file = $request->file('additional_image');
					 
					 
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

			  $file->move('images/students/additionalimages',  $image);
			 
			 // create new Intervention Image
			  $img = \Image::make('images/students/additionalimages/'.$image);
			  
			  // paste another image
			  $img->insert('images/students/additionalimages/hermon.jpg', 'bottom-right', 10, 10);
			 
			 //save
			  $img->save('images/students/additionalimages/'.$image);
			  $image = new AdditionalImage(['student_id'=>$student_id,'images'=>$image]);
			  $image->save();
			  
			  return redirect('/admin/students/add/image/'.$student_id)->with('status', 'image Created');

		 }

	      return view('admin.addimage.create',compact('student'));

    }
	
	public  function delete($add_image_id) { 
	
	       
		    $images_to_delete =  AdditionalImage::find($add_image_id);
			
			
		   \File::Delete($this->path().'/'.$images_to_delete->images);
	        AdditionalImage::destroy($add_image_id);
		   return redirect()->back()->with('status', 'REMOVED ');//reject if we have only on address

	}
	
	private function path() { 
	
	  return base_path().'/public/images/students/additionalimages';
	}
}
