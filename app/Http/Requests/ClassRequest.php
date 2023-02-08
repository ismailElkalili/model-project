<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassRequest extends FormRequest
{
    /**
    * Determine if the user is authorized to make this request.
    *
    *    $classes = DB::table('classes')->insert([
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
            'classesName' => 'required',
            'state' => 'required',
            'teacherID' => 'required',
            'subjectID' => 'required'
        ];
    }
    public function messages()
    {
        return [

            'classesName.required' => 'please enter the classname',
            'state.required' => 'please choose state',
            'teacherID.required' => 'please choose teacher_id',
            'subjectID.required' => 'please choose subject_id'

        ];
    }
}