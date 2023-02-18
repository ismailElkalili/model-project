<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExamRequest extends FormRequest
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
            'exam_name' => 'required|string',
            'exam_duration' => 'required|min:0',
            'exam_type' => 'required|string',
            'exam_class_id' => 'required',
            'exam_startAtDate' => 'required|date',
        ];
    }
    public function messages()
    {
        return [
            'exam_name.required' => 'please enter the exam name',
            'exam_name.string' => 'please enter exam name must be a string',
            'exam_duration.required' => 'please choose the duration of the exam',
            'exam_type.required' => 'please choose the duration of the exam',
            'exam_startAtDate.required' => 'please enter the date of the exam',
            'exam_startAtDate.date' => 'the date you enter is invalid',
            'exam_class_id.required' => 'please choose the class',
            'exam_duration.min' => 'please choose the exam duration',
            'exam_type.string' => 'please choose the exam duration',
        ];
    }
}