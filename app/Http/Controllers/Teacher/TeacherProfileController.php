<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class TeacherProfileController extends Controller
{
    //
    function getProfileData($teacherId)
    {
        $teacher = DB::table('teachers')->where('id', $teacherId)->first();
        $level = DB::table('levels')->where('id', $teacher->level_id)->first();
        $classes = DB::select('SELECT c.* FROM `classes` AS c WHERE (   c.teacher_id IN ( SELECT t.id FROM `teachers` AS t WHERE t.id= ' . $teacher->id . '  )   )');
        $subjects = DB::select('SELECT s.* FROM subjects AS s 
            WHERE s.id IN ( 
                 SELECT c.id FROM classes as c WHERE c.teacher_id =' . $teacher->id . '
                 )');
        // dd([$classes, $subjects, $teacher]);
        return view('teacher.teacher_profile')
            ->with([
                'teacher' => $teacher,
                'level' => $level,
                'classes' => $classes,
                'subjects' => $subjects
            ]);
    }
}