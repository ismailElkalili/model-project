<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubjectRequest extends FormRequest
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
            'subject_name' => 'required',
            'subject_level' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'subject_name.required' => 'please enter the subject name',
            'subject_level.required' => 'please enter the subject level'
            //
        ];
    }
}