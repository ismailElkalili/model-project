<?php

namespace App\Http\Controllers\Exam;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExamRequest;
use App\Imports\QuestionsImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class ExamController extends Controller
{
    //teacher

    public function create()
    {
        $classes = DB::table('classes')->get();
        return view('exam.create')->with('classes', $classes);
    }
    //teacher
    public function store(ExamRequest $request)
    {
        $exam_code = Str::random(Str::length($request['exam_name']));
        DB::table('exams')->insert([
            'exam_name' => $request['exam_name'],
            'exam_type' => $request['exam_type'],
            'exam_code' => $exam_code,
            'exam_duration' => $request['exam_duration'],
            'exam_startAt' => $request['exam_startAtDate'],
            'exam_state' => 0,
            'class_id' => $request['exam_class_id'],
        ]);
        return back();
    }
    //teacher(see the details of exam)
    public function show($exam_id)
    {
        $exam = DB::table('exams')->where('id', $exam_id)->first();
        return view('exam.show_exam_details', ['exam' => $exam]);
    }
    //student(show his exam in that subject)
    public function showExamsForStudnet($classID, $studentID)
    {
        $examsForStudent = DB::select('SELECT e.* FROM `exams` AS e WHERE e.class_id = ' . $classID . '');
        return view('exam.index_exams_for_student', ['examsForStudent' => $examsForStudent]);

    }
    //teacher
    public function importView(Request $request, $exam_code)
    {
        return view('question.craete', ['exam_code' => $exam_code]);
    }
    //teacher
    public function import(Request $request)
    {
        Excel::import(
            new QuestionsImport,
            $request->file('file')->store('files')
        );

        return redirect()->back();
    }
    //methd out of context
    public static function getQuestionsAndOpExam($classID, $examID, $rightAnswer)
    {
        
        $qForGetQAndOp = 'SELECT q.question_text as question_text , q.id as question_id ,q.question_mark as question_mark ,q.exam_id as exam_id  ,qo.* FROM `quistion_options` AS qo ,`questions` AS q
            WHERE qo.right_answer = ' . $rightAnswer . ' AND q.id = qo.question_id AND q.exam_id IN(
            SELECT e.id FROM `exams` AS e WHERE e.id = ' . $examID . ' AND e.exam_state = 0 AND e.class_id IN(
            SELECT std_c.class_id FROM `std_classes` AS std_c WHERE std_c.class_id = ' . $classID . '
            )
            )';
        return DB::select($qForGetQAndOp);

    }

}
