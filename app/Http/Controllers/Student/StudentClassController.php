<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentClassController extends Controller
{
    public function profile($studentID)
    {
        $std_classes = DB::select('SELECT * FROM `std_classes` AS `std_c` WHERE std_c.student_id IN(SELECT   students.id FROM `students` WHERE id = ' . $studentID . ')');
        $query = 'SELECT s.* FROM `subjects` AS s WHERE (
            s.id IN (
                SELECT c.subject_id FROM `classes` AS c WHERE c.subject_id = s.id AND
                    (
                         c.id IN (
                             SELECT std_s.class_id FROM `std_classes` AS std_s WHERE std_s.class_id = c.id AND std_s.student_id = ' . $studentID . '
                         )
                     )
            )
        )';
        // $query2 = 'SELECT  * FROM subjects AS `std_v` 
        // WHERE std_v.id IN(SELECT  id FROM classes WHERE id IN( SELECT   std_c.class_id FROM   `std_classes` AS `std_c` 
        // WHERE std_c.student_id IN( SELECT    students.id FROM   `students`   WHERE    id = ' . $studentID . ' ) ) )';
        $student = DB::table('students')->where('id', '=', $studentID)->first();
        $level = DB::table('levels')->where('id', $student->level_id)->first();
        $studentClasses = DB::select($query);
      
        return view('std_class.index')
            ->with('student', $student)
            ->with('level', $level)
            ->with('studentClasses', $studentClasses)
            ->with('std_classes', $std_classes);
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
    public function store(Request $request)
    {
        //
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