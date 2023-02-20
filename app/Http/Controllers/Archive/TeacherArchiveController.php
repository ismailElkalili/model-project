<?php

namespace App\Http\Controllers\Archive;

use App\Http\Controllers\Controller;
use App\Http\Controllers\methoeds\MakeIsDeleted;
use Illuminate\Support\Facades\DB;

class TeacherArchiveController extends Controller
{
    public function indexTeacherArchive()
    {
        $teachers = DB::table('teachers')->where('isDelete', 1)->select(['id', 'teacher_name', 'teacher_email', 'teacher_phone_number'])->get();
        return view('archive.teacher_archive', ['teachers' => $teachers]);
    }

    public function archive($teacherID)
    {
        MakeIsDeleted::makeIsDelete('teachers', $teacherID, 1);
        return redirect()->route('indexTeacher');
    }

    public function restore($teacherID)
    {
        MakeIsDeleted::makeIsDelete('teachers', $teacherID, 0);
        return redirect()->route('indexTeacher');
    }

    public function destroy($teacherID)
    {
        DB::table('teachers')->where('id', $teacherID)->delete();
        return redirect()->back()->with('mes', "Deleted Succesed");
    }

}
