<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = DB::table('students')->get();
        return view('student.index')->with('students', $students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function profile($studentID)
    {
        $query='SELECT s.* FROM `subjects` AS s WHERE (
            s.id IN (
                SELECT c.subject_id FROM `classes` AS c WHERE c.subject_id = s.id AND
                    (
                         c.id IN (
                             SELECT std_s.class_id FROM `std_classes` AS std_s WHERE std_s.class_id = c.id AND std_s.student_id = '.$studentID.'
                         )
                     )
            )
        )';
        $student = DB::table('students')->where('id', '=', $studentID)->first();
        $level = DB::table('levels')->where('id', $student->level_id)->first();
        $studentClasses = DB::select($query);
        return view('student.profile')
            ->with('student', $student)
            ->with('level', $level)
            ->with('studentClasses', $studentClasses);
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
