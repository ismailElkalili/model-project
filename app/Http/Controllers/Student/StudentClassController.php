<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentClassController extends Controller
{
    public function profile($studentID)
    {
        $student = DB::table('students')->where('student_id', '=', $studentID)->first();
        $level = DB::table('levels')->where('id', $student->level_id)->first();

        $subjectsJoin = StudentClassController::subjectsJoin($studentID);

        $subjectsAccpet = StudentClassController::subjectsAccpet($studentID);

        $subjectsUnJoin = StudentClassController::subjectsUnJoin($studentID, $level->id);
        //student_panel.student_panel
        return view('std_class.index', [
            'student' => $student,
            'level' => $level,
            'subjectsJoin' => $subjectsJoin,
            'subjectsUnJoin' => $subjectsUnJoin,
            'subjectsAccpet' => $subjectsAccpet
        ]);
    }


    public function joinClass(Request $request, $classID, $studentID)
    {
        DB::table('std_classes')->insert([
            'student_id' => $studentID,
            'class_id' => $classID,
            'state' => 1,
        ]);
        dd($request);
        if ($request->is('/stdClass/profile/*')) {
            return redirect()->route('studentClassProfile', $studentID);
        } else {
            return redirect()->route('studentProfile', $studentID);
        }
    }

    public function subjectsJoin($studentID)
    {
        $qForSubjectsJoin = 'SELECT subject.*,c.id AS classID,c.class_name ,t.teacher_name FROM `teachers` as t, `subjects` AS subject,`classes` AS c WHERE(
            subject.id = c.subject_id AND c.teacher_id = t.id AND c.id IN (
            SELECT std_classes.class_id FROM std_classes WHERE std_classes.state = 1 AND std_classes.student_id = ' . $studentID . '
            )
            )';
        return DB::select($qForSubjectsJoin);
    }


    public function subjectsUnJoin($studentID, $levelID)
    {
        $qForSubjectsUnJoin = 'SELECT subject.*,c.id AS classID,c.class_name ,c.level_id ,t.teacher_name FROM `teachers` as t, `subjects` AS subject,`classes` AS c WHERE(
            subject.id = c.subject_id AND c.level_id = ' . $levelID . ' AND c.teacher_id = t.id AND c.id NOT IN (
            SELECT std_classes.class_id FROM std_classes WHERE std_classes.student_id = ' . $studentID . '
            )
            )';

        return DB::select($qForSubjectsUnJoin);
        ;
    }

    public function subjectsAccpet($studentID)
    {
        $qForSubjectsAccpet = 'SELECT subject.*,c.id AS classID, c.class_name AS class_name ,t.teacher_name as teacher_name FROM `teachers` as t, `subjects` AS subject,`classes` AS c WHERE(
            subject.id = c.subject_id AND c.teacher_id = t.id AND c.id IN (
            SELECT std_classes.class_id FROM std_classes WHERE std_classes.state = 2 AND std_classes.student_id = ' . $studentID . '
            )
            )';

        return DB::select($qForSubjectsAccpet);
    }

}