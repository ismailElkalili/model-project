<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'student_First_Name' => 'required|min:3',
            'student_Father_Name' => 'required|min:3',
            'student_Grandfather_Name' => 'required|min:3',
            'student_Last_Name' => 'required|min:3',
            'gender' => 'required',
            'email' => 'required|email:rfc,dns,filter',
            'dob' => 'required|date|date_equals:date',
            'levelID' => 'required',
            'image' => 'image|mimes:png,jpg,jpeg|max:2048'
            
        ];
    }
    public function messages()
    {
        return [
            'student_First_Name' => 'required|min:3',
            'student_Father_Name' => 'required|min:3',
            'student_Grandfather_Name' => 'required|min:3',
            'student_Last_Name' => 'required|min:3',
            'gender' => 'required',
            'email' => 'required|email:rfc,dns,filter',
            'dob' => 'required|date|date_equals:date',
            'levelID' => 'required',
            'image' => 'image|mimes:png,jpg,jpeg|max:2048'
            
        ];
    }
}
