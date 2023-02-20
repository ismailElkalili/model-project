<?php

namespace App\Http\Controllers\Archive;

use App\Http\Controllers\Controller;
use App\Http\Controllers\methoeds\MakeIsDeleted;
use Illuminate\Support\Facades\DB;

class SubjectArchiveController extends Controller
{

    public function indexSubjectArchive()
    {
        $subjects = DB::table('subjects')->where('isDelete', 1)->get();
        $levels = DB::table('levels')->where('isDelete', 0)->get();
        return view('archive.subject_archive', ['subjects' => $subjects, 'levels' => $levels]);
    }
    public function archive($subjectID)
    {
        MakeIsDeleted::makeIsDelete('subjects', $subjectID, 1);
        return redirect()->route('indexSubject');
    }

    public function restore($subjectID)
    {
        MakeIsDeleted::makeIsDelete('subjects', $subjectID, 0);
        return redirect()->route('indexSubject');
    }

    public function destroy($subjectID)
    {
        DB::table('subjects')->where('id', $subjectID)->delete();
        return redirect()->back()->with('mes', "Deleted Succesed");
    }
}
