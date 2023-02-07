<?php

namespace App\Http\Controllers\Archive;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class StudentArchiveController extends Controller
{
    public function indexStudentArchive()
    {
        $students = DB::table('students')->where('isDelete', 1)->get();
        $levels = DB::table('levels')->get();
        return view('archive.student_archive')
            ->with('students', $students)
            ->with('levels', $levels);
    }
    public function archive($studentID)
    {
        DB::table('students')->where('id', $studentID)->update(['isDelete' => 1]);
        return redirect('/student/index');
    }

    public function restore($studentID)
    {
        DB::table('students')->where('id', $studentID)->update(['isDelete' => 0]);
        return redirect('/student/index');
    }
}

