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
    'teacher_email' => $request['email'],
    'teacher_image' => $path,
    'Dob' => $request['dob'],
    'qualification' => $request['qualification'],
    'gender' => $request['gender'],
    'teacher_phone_number' => $request['phone_number'],
    'level_id' => $request['levelID']
    ]);
    teacher_First_Name
    teacher_second_Name
    teacher_third_Name
    teacher_Last_Name
    */
    public function rules()
    {
        return [
            'teacher_email' => 'required|string|email',
            'teacher_image' => 'required',
            'teacher_First_Name' => 'required|string',
            'teacher_second_Name' => 'required|string',
            'teacher_third_Name' => 'required|string',
            'teacher_Last_Name' => 'required|string',
            'qualification' => 'required',
            'teacher_phone_number' => 'required|numeric',
            'level_id' => 'required',
            'dob' => 'required|date',
            'gender' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'teacher_email.required' => 'please enter your email',
            'teacher_email.email' => 'your email is not valid',
            'teacher_image.required' => 'please uplaod your profile image',
            'teacher_First_Name.required' => 'please enter your first name ',
            'teacher_First_Name.string' => 'your first name must be string',
            'teacher_second_Name.required' => 'please enter your second name',
            'teacher_second_Name.string' => 'your second name must be string',
            'teacher_third_Name.required' => 'please enter your third name',
            'teacher_third_Name.string' => 'your third name must be string',
            'teacher_Last_Name.required' => 'please enter your last name',
            'teacher_Last_Name.string' => 'your last name must be string',
            'qualification.required' => 'please choose your qualification',
            'level_id.required' => 'please choose the level',
            'dob.required' => 'please enter your Date of birth',
            'dob.date' => 'the date you enter is not valid ',
            'gender.required' => 'please choose your gender',
            'teacher_phone_number.required' => 'please enter your phone number',
            'teacher_phone_number.numeric' => 'your phone number is not valid'
        ];
    }
}