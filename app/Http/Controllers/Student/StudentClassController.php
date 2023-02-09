<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
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

        $qForSubjectsJoin = 'SELECT subject.*,c.id AS classID,c.class_name FROM `subjects` AS subject,`classes` AS c WHERE(
            subject.id = c.subject_id AND c.id IN (
            SELECT std_classes.class_id FROM std_classes WHERE std_classes.student_id = ' . $studentID . '
            ) AND c.id IN (
            SELECT std_classes.class_id FROM std_classes WHERE std_classes.state = 1
            )
            )';

        $subjectsJoin = DB::select($qForSubjectsJoin);

        $qForSubjectsUnJoin = 'SELECT subject.*,c.id AS classID,c.class_name ,c.level_id  FROM `subjects` AS subject,`classes` AS c WHERE(
                subject.id = c.subject_id AND c.level_id = ' . $level->id . ' AND c.id NOT IN (
                SELECT std_classes.class_id FROM std_classes WHERE std_classes.student_id = ' . $studentID . '
                )
                )';

        $qForSubjectsAccpet = 'SELECT subject.*,c.id AS classID,c.class_name FROM `subjects` AS subject,`classes` AS c WHERE(
                    subject.id = c.subject_id AND c.id IN (
                    SELECT std_classes.class_id FROM std_classes WHERE std_classes.student_id = ' . $studentID . '
                    ) AND c.id IN (
                    SELECT std_classes.class_id FROM std_classes WHERE std_classes.state = 2
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
    public function show($id)
    {

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
