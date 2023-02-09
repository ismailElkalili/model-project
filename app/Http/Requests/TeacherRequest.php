<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
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
    *   'teacher_name' => $name,
    
    */
    public function rules()
    {
        return [
            'email' => 'required|string|email',
            'teacher_First_Name' => 'required|string',
            'teacher_second_Name' => 'required|string',
            'teacher_third_Name' => 'required|string',
            'teacher_Last_Name' => 'required|string',
            'qualification' => 'required',
            'phone_number' => 'required|numeric',
            'levelID' => 'required',
            'dob' => 'required|date',
            'gender' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'please enter your email',
            'email.email' => 'your email is not valid',
            'teacher_First_Name.required' => 'please enter your first name ',
            'teacher_First_Name.string' => 'your first name must be string',
            'teacher_second_Name.required' => 'please enter your second name',
            'teacher_second_Name.string' => 'your second name must be string',
            'teacher_third_Name.required' => 'please enter your third name',
            'teacher_third_Name.string' => 'your third name must be string',
            'teacher_Last_Name.required' => 'please enter your last name',
            'teacher_Last_Name.string' => 'your last name must be string',
            'qualification.required' => 'please choose your qualification',
            'levelID.required' => 'please choose the level',
            'dob.required' => 'please enter your Date of birth',
            'dob.date' => 'the date you enter is not valid ',
            'gender.required' => 'please choose your gender',
            'phone_number.required' => 'please enter your phone number',
            'phone_number.numeric' => 'your phone number is not valid'
        ];
    }
}