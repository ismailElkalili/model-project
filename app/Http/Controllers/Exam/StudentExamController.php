<?php

namespace App\Http\Controllers\Exam;

use App\Http\Controllers\Controller;
use App\Http\Controllers\methoeds\IsExpiredTime;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Exam\ExamController;

class StudentExamController extends Controller
{
    //student(show his exam in that subject)
    public function showExamsForStudnet($classID, $studentID)
    {
        $examsForStudent = DB::select('SELECT e.* FROM `exams` AS e WHERE e.class_id = ' . $classID . '');
        return view('exam.index_exams_for_student', ['examsForStudent' => $examsForStudent]);

    }
    //student(view the remaining time to start exam)
    public function showExamDetails($classID, $examID)
    {
        $examForStudent = DB::table('exams')->where('class_id', $classID)->where('id', $examID)->first();

        $isExpired = IsExpiredTime::isExpiredTime($examForStudent->exam_startAt, $examForStudent->exam_duration);

        $isSubmited = DB::table('std_answers')->where('exam_id', $examID)->where('student_id', 1)->exists();
        return view('exam.view_exam', [
            'examForStudent' => $examForStudent,
            'isExpired' => $isExpired,
            'classID' => $classID,
            'isSubmited' => $isSubmited,
        ]);
    }
    //student(attend the exam)
    public function showExamQuestions($classID, $examID)
    {
        $examTime = DB::table('exams')->select('exam_startAt', 'exam_duration')->where('id', $examID)->first();
        $isExpired = IsExpiredTime::isExpiredTime($examTime->exam_startAt, $examTime->exam_duration);
        $qAndOp = ExamController::getQuestionsAndOpExam($classID, $examID, 0);
        return view('exam.new_exam', ['qAndOp' => $qAndOp, 'examTime' => $examTime, 'classID' => $classID, 'isExpired' => $isExpired]);
    }
    //student (see the result)
    public function showAnswersForStudent($classID, $examID)
    {
        $qAndOp = ExamController::getQuestionsAndOpExam($classID, $examID, 0);
        $qAndOpWithAnswers = ExamController::getQuestionsAndOpExam($classID, $examID, 1);
        $answersStudent = DB::table('std_answers')->where('exam_id', $examID)->where('student_id', 1)->first();
        $arrayAnswerStudentsJson = json_decode($answersStudent->student_answer, true);
        $studentMark = $answersStudent->student_mark;
        $allQuestionesAndStudentAnswers = [];
        for ($i = 0; $i < count($qAndOpWithAnswers); $i++) {
            $allQuestionesAndStudentAnswers[$qAndOpWithAnswers[$i]->question_id] = $arrayAnswerStudentsJson[$qAndOpWithAnswers[$i]->question_id] ?? "";
        }

        return view('exam.old_exam', ['qAndOp' => $qAndOp, 'qAndOpWithAnswers' => $qAndOpWithAnswers, 'answersStudent' => $allQuestionesAndStudentAnswers, 'studentMark' => $studentMark]);
    }
}
