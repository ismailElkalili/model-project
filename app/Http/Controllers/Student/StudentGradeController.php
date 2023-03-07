<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Exam\ExamController;

class StudentGradeController extends Controller
{
    public static function sumGradeForStudent($answers, $exam, $classID)
    {
        $mark = 0;
        dd($answers);
        $rightAnswer = ExamController::getQuestionsAndOpExam($classID, 1, 1);
        
        $keys = array_keys($answers);
        for ($i = 0; $i < count($rightAnswer); $i++) {
            for ($x = 0; $x < count($keys); $x++) {
                if (($rightAnswer[$i]->question_id == array_search($answers[$keys[$x]], $answers))
                 && (json_decode($rightAnswer[$i]->options, true) == $answers[$keys[$x]])) {
                    $mark += $rightAnswer[$i]->question_mark;
                }
            }
        }
        return $mark;
    }

}
