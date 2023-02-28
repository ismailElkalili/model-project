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
            'email' => 'required|email',
            'dob' => 'required|date',
            'levelID' => 'required',
            'image' => 'required'

        ];
    }
    public function messages()
    {
        return [
            'student_First_Name.required' => 'please enter your first name ',
            'student_First_Name.min' => 'your first name invalid',
            'student_Father_Name.required' => 'please enter your Second name',
            'student_Father_Name.min' => 'your Second name invalid',
            'student_Grandfather_Name.required' => 'please enter your Grand Father name',
            'student_Grandfather_Name.min' => 'your Grand name invalid',
            'student_Last_Name.required' => 'please enter your Last name',
            'student_Last_Name.min' => 'your Last name invalid',
            'gender.required' => 'please enter your gender',
            'email.required' => 'please enter your email',
            'email.email' => 'email invalid',
            'dob.required' => 'please enter your date of birth',
            'dob.date' => 'your date of birth invalid ',
            'levelID.required' => 'please enter your email',
            'image.required' => 'please enter your profile image'

        ];
    }
}