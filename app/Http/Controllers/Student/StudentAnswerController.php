<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Exam\ExamController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentAnswerController extends Controller
{
    
    public function stoerAnswersExam(Request $request)
    {

        $answers = $request['datas'];
        $examID = $request['exam'];
    
            DB::table('std_answers')->insert([
               'student_answer' =>  json_encode($answers),
                'exam_id' => $examID,
                'student_id' => 1,
            ]);
        
        return redirect()->route('indexStudents');
    }
    
}
