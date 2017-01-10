<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
	
	public function messages()
    {
		return [
			'last_name' => 'The last name is required',
		];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
			'student_name' => 'required|max:30',
		    'student_last_name' => 'required|max:30',
		    'grade'=>'required|max:30',
        ];
    }
}
