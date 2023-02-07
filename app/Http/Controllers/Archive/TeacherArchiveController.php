<?php

namespace App\Http\Controllers\Archive;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class TeacherArchiveController extends Controller
{
    public function indexTeacherArchive()
    {
        $teachers = DB::table('teachers')->where('isDelete', 1)->select(['id', 'teacher_name', 'teacher_email', 'teacher_phone_number'])->get();
        return view('archive.teacher_archive')->with('teachers', $teachers);
    }

    public function archive($teacherID)
    {
        DB::table('teachers')->where('id', $teacherID)->update(['isDelete' => 1]);
        return redirect('/teacher/index');
    }

    public function restore($teacherID)
    {
        DB::table('teachers')->where('id', $teacherID)->update(['isDelete' => 0]);
        return redirect('/teacher/index');
    }

}
