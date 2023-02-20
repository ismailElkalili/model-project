<?php

namespace App\Http\Controllers\Archive;

use App\Http\Controllers\Controller;
use App\Http\Controllers\methoeds\MakeIsDeleted;
use Illuminate\Support\Facades\DB;

class StudentArchiveController extends Controller
{
    public function indexStudentArchive()
    {
        $students = DB::table('students')->where('isDelete', 1)->get();
        $levels = DB::table('levels')->where('isDelete', 0)->get();
        return view('archive.student_archive', ['students' => $students, 'levels' => $levels]);
    }
    public function archive($studentID)
    {
        MakeIsDeleted::makeIsDelete('students', $studentID, 1);
        return redirect()->route('indexStudents');
    }

    public function restore($studentID)
    {
        MakeIsDeleted::makeIsDelete('students', $studentID, 0);
        return redirect()->route('indexStudents');
    }

    public function destroy($studentsID)
    {
        DB::table('students')->where('id', $studentsID)->delete();
        return redirect()->back()->with('mes', "Deleted Succesed");
    }

}
