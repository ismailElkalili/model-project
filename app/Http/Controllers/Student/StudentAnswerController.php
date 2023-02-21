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
        $classID = $request['classID'];

        $mark = StudentGradeController::sumGradeForStudent($answers ,$examID ,$classID);
        DB::table('std_answers')->insert([
            'student_answer' => json_encode($answers),
            'exam_id' => $examID,
            'student_id' => 1,
            'student_mark' => $mark,
        ]);

        return redirect()->route('indexStudents');
    }

}
