<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentClassController extends Controller
{
    public function profile($studentID)
    {

        // $query2 = 'SELECT  * FROM subjects AS `std_v`
        // WHERE std_v.id IN(SELECT  id FROM classes WHERE id IN( SELECT   std_c.class_id FROM   `std_classes` AS `std_c`
        // WHERE std_c.student_id IN( SELECT    students.id FROM   `students`   WHERE    id = ' . $studentID . ' ) ) )';
        $student = DB::table('students')->where('id', '=', $studentID)->first();
        $level = DB::table('levels')->where('id', $student->level_id)->first();

        // $query = 'SELECT s.* FROM `subjects` AS s WHERE(
        //     s.id IN(
        //     SELECT c.subject_id FROM `classes` AS c
        //     WHERE
        //         s.level_id = ' . $level->id . ' AND
        //         c.subject_id = s.id AND(
        //             c.id IN(
        //             SELECT
        //                 std_s.class_id
        //             FROM
        //                 `std_classes` AS std_s
        //             WHERE
        //                 std_s.class_id = c.id AND std_s.student_id = ' . $studentID . '
        //         )
        //         )
        // )
        // )';
        // $subjects = DB::table('subjects')->where('level_id', $level->id)->get();
        // $classes = DB::table('classes')->where('level_id', $level->id)->get();
        // $studentSubject = DB::select($query);

        // $q = 'SELECT stdc.* FROM `std_classes` AS stdc WHERE stdc.class_id IN(
        //     SELECT c.id FROM `classes` AS c
        //     ) AND stdc.student_id = ' . $studentID . '';
        // $std_classe = DB::select($q);

        $qForSubjectsJoin = 'SELECT subject.*,c.id AS classID,c.class_name ,t.teacher_name FROM `teachers` as t, `subjects` AS subject,`classes` AS c WHERE(
            subject.id = c.subject_id AND c.teacher_id = t.id AND c.id IN (
            SELECT std_classes.class_id FROM std_classes WHERE std_classes.state = 1 AND std_classes.student_id = ' . $studentID . '
            )
            )';

        $subjectsJoin = DB::select($qForSubjectsJoin);

        $qForSubjectsUnJoin = 'SELECT subject.*,c.id AS classID,c.class_name ,c.level_id ,t.teacher_name FROM `teachers` as t, `subjects` AS subject,`classes` AS c WHERE(
                subject.id = c.subject_id AND c.level_id = ' . $level->id . ' AND c.teacher_id = t.id AND c.id NOT IN (
                SELECT std_classes.class_id FROM std_classes WHERE std_classes.student_id = ' . $studentID . '
                )
                )';

        $qForSubjectsAccpet = 'SELECT subject.*,c.id AS classID, c.class_name AS class_name ,t.teacher_name as teacher_name FROM `teachers` as t, `subjects` AS subject,`classes` AS c WHERE(
                    subject.id = c.subject_id AND c.teacher_id = t.id AND c.id IN (
                    SELECT std_classes.class_id FROM std_classes WHERE std_classes.state = 2 AND std_classes.student_id = ' . $studentID . '
                    )
                    )';

        $subjectsAccpet = DB::select($qForSubjectsAccpet);

        $subjectsUnJoin = DB::select($qForSubjectsUnJoin);

        return view('std_class.index')
            ->with('student', $student)
            ->with('level', $level)
            ->with('subjectsJoin', $subjectsJoin)
            ->with('subjectsUnJoin', $subjectsUnJoin)
            ->with('subjectsAccpet', $subjectsAccpet);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function joinClass(Request $request, $classID, $studentID)
    {
        DB::table('std_classes')->insert([
            'student_id' => $studentID,
            'class_id' => $classID,
            'state' => 1,
        ]);

        return redirect("/stdClass/profile/$studentID");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($classID, $studentID)
    {
        $examsForStudent = DB::select('SELECT e.* FROM `exams` AS e WHERE e.class_id = ' . $classID . '');

        $qForGetQAndOp = 'SELECT q.* ,qo.* FROM `quistion_options` AS qo ,`questions` AS q WHERE qo.right_answer = 0 AND q.id = qo.question_id AND q.exam_id IN(
            SELECT e.id FROM `exams` AS e WHERE e.class_id IN(
            SELECT std_c.class_id FROM `std_classes` AS std_c WHERE std_c.class_id = ' . $classID . '
            )
            )';
        $qAndOp = DB::select($qForGetQAndOp);

        return view('exam.index')->with('examsForStudent', $examsForStudent);

        // dd(json_decode($qAndOp[0]->options, true));
    }

    public function showExamIndex($classID, $examID)
    {

        $examForStudent = DB::table('exams')->where('class_id', $classID)->where('id', $examID)->first();
        $now = Carbon::now()->addMinutes(120);
        $startDate = Carbon::parse($examForStudent->exam_duration);
        $endDate = Carbon::parse($examForStudent->exam_duration)->addMinutes(720);
        // dd([$now, $startDate , $endDate]);
        if ($now->between($startDate, $endDate)) {
            $isExpired = false;
        } else {
            $isExpired = true;

        }

        return view('exam.view_exam')->with('examForStudent', $examForStudent)->with('isExpired', $isExpired)->with('classID', $classID);
    }

    public function showExam($classID, $examID)
    {
        $qForGetQAndOp = 'SELECT q.* ,qo.* FROM `quistion_options` AS qo ,`questions` AS q WHERE qo.right_answer = 0 AND q.id = qo.question_id AND q.exam_id IN(
            SELECT e.id FROM `exams` AS e WHERE e.id = ' . $examID . ' AND e.exam_state = 0 AND e.class_id IN(
            SELECT std_c.class_id FROM `std_classes` AS std_c WHERE std_c.class_id = ' . $classID . '
            )
            )';
        $examTime = DB::table('exams')->select('exam_duration')->where('id', $examID)->first();

        $now = Carbon::now()->addMinutes(120);
        $startDate = Carbon::parse($examTime->exam_duration);
        $endDate = Carbon::parse($examTime->exam_duration)->addMinutes(720);
        if ($now->between($startDate, $endDate)) {
            $isExpired = false;
        } else {
            $isExpired = true;

        }
        $qAndOp = DB::select($qForGetQAndOp);

        return view('exam.new_exam')->with('qAndOp', $qAndOp)->with('examTime', $examTime)->with('classID', $classID)->with('isExpired', $isExpired);

    }

    public function stoerAnswersExam(Request $request)
    {
        $answers = $request['datas'];
        $examID = $request['exam'];
        foreach ($answers as $item) {
            DB::table('std_answers')->insert([
                'student_answer' => $item,
                'option_id' => array_search($item, $answers),
                'exam_id' => $examID,
                'student_id' => 1,
            ]);
        }
        return redirect("/student/index");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
