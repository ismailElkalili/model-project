<?php

namespace App\Http\Controllers\Archive;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ExamArchiveController extends Controller
{
    public function indexExamArchive()
    {
        return view('archive.exam_archive');
    }

    public function archive($examID)
    {
        DB::table('exams')->where('id', $examID)->update(['isDelete' => 1]);
        return redirect('/exam/index');
    }

    public function restore($examID)
    {
        DB::table('exams')->where('id', $examID)->update(['isDelete' => 0]);
        return redirect('/exam/index');
    }
}
