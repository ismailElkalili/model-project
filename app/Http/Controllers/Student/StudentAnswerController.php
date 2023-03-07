<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Exam\ExamController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class StudentAnswerController extends Controller
{

    public function stoerAnswersExam(Request $request)
    {
        
        // dd('aaa');
         $answers = $request['datas'];
        $exam = $request['exam'];
        $classID = $request['classID'];
        // dd($answers);
        $mark = StudentGradeController::sumGradeForStudent($answers ,$exam ,$classID);
        DB::table('std_answers')->insert([
            'student_answer' => json_encode($answers),
            'exam_id' => $exam,
            'student_id' => Auth::user()->id,
            'student_mark' => 0,
        ]);

        return redirect()->route('indexStudents');
    }

}
