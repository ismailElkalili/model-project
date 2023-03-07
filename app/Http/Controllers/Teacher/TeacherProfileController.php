<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class TeacherProfileController extends Controller
{
    //
    public function getProfileData($teacherId)
    {

        $teacher = DB::table('teachers')->join('users', 'teachers.teacher_id', '=', 'users.id')
            ->where('teachers.isDelete', 0)->first();
        $level = DB::table('levels')->where('id', $teacher->level_id)->first();
        $classes = DB::select('SELECT c.* , s.subject_name , s.id AS sub_id FROM `subjects` AS s,`classes` AS c WHERE  c.teacher_id =' . $teacherId . ' AND c.subject_id =s.id');
        $subjects = DB::select('SELECT s.* FROM subjects AS s
            WHERE s.id IN (
                 SELECT c.id FROM classes as c WHERE c.teacher_id =' . $teacherId . '
                 )');
        $exams = DB::select('SELECT ex.*,sub.subject_name ,cs.class_name
        FROM exams AS ex,subjects AS sub ,classes AS cs
        WHERE ex.class_id = cs.id
        AND cs.teacher_id = ' . $teacherId . '
        AND  sub.id = cs.subject_id
        ');

        return view('teacher.teacher_profile')
            ->with([
                'teacher' => $teacher,
                'level' => $level,
                'classes' => $classes,
                'subjects' => $subjects,
                'exams' => $exams,
            ]);
    }
    public function getdata($teacherId)
    {

        $teacher = DB::table('teachers')->where('teacher_id', $teacherId)->first();
        $level = DB::table('levels')->where('id', $teacher->level_id)->first();
        $classes = DB::select('SELECT c.* , s.subject_name , s.id AS sub_id FROM `subjects` AS s,`classes` AS c WHERE  c.teacher_id =' . $teacher->teacher_id . ' AND c.subject_id =s.id');
        $subjects = DB::select('SELECT s.* FROM subjects AS s
            WHERE s.id IN (
                 SELECT c.id FROM classes as c WHERE c.teacher_id =' . $teacher->teacher_id . '
                 )');
        $exams = DB::select('SELECT ex.*,sub.subject_name ,cs.class_name
        FROM exams AS ex,subjects AS sub ,classes AS cs
        WHERE ex.class_id = cs.id
        AND cs.teacher_id = 1
        AND  sub.id = cs.subject_id
        ');

        return view('teacher_panel.teacher_panel')
            ->with([
                'teacher' => $teacher,
                'level' => $level,
                'classes' => $classes,
                'subjects' => $subjects,
                'exams' => $exams,
            ]);
    }

    public function getSubjcteForTeacher($teacherId, $classID, $subjectID)
    {

        $query = 'SELECT std_classes.*, classes.class_name , users.name FROM
            `classes`, `std_classes`,`students`,`users` WHERE
            (classes.teacher_id = ' . $teacherId . ' AND
            std_classes.class_id = ' . $classID . ' AND
            classes.subject_id = ' . $subjectID . ' AND
            students.student_id = std_classes.student_id  AND
            std_classes.state = 1 AND
            users.id=students.student_id

        )';
        $studentsClassReq = DB::select($query);
        // dd(count($studentsClassReq));
        return view('teacher.students_class')->with('studentsClassReq', $studentsClassReq);

    }

    public function rejectStudent($stdClassID)
    {
        DB::table('std_classes')->where('id', $stdClassID)->delete();
        return back();
    }

    public function acceptStudent($stdClassID)
    {
        DB::table('std_classes')->where('id', $stdClassID)->update([
            'state' => 2,
        ]);
        return back();
    }
}
