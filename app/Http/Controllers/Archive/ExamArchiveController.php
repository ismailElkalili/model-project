<?php

namespace App\Http\Controllers\Archive;

use App\Http\Controllers\Controller;
use App\Http\Controllers\methoeds\MakeIsDeleted;
use Illuminate\Support\Facades\DB;

class ExamArchiveController extends Controller
{
    public function indexExamArchive()
    {
        return view('archive.exam_archive');
    }

    public function archive($examID)
    {
        MakeIsDeleted::makeIsDelete('exams', $examID, 1);
        
        return redirect('/exam/index');
    }

    public function restore($examID)
    {
        MakeIsDeleted::makeIsDelete('exams', $examID, 0);
       
        return redirect('/exam/index');
    }

    public function destroy($examID)
    {
        DB::table('exams')->where('id', $examID)->delete();
        return redirect()->back()->with('mes', "Deleted Succesed");
    }
}
