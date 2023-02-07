<?php

namespace App\Http\Controllers\Archive;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SubjectArchiveController extends Controller
{

    public function indexSubjectArchive()
    {
        $subjects = DB::table('subjects')->where('isDelete', 1)->get();
        $levels = DB::table('levels')->where('isDelete', 0)->get();
        return view('archive.subject_archive')
            ->with('subjects', $subjects)
            ->with('levels', $levels);
    }
    public function archive($subjectID)
    {
        DB::table('subjects')->where('id', $subjectID)->update(['isDelete' => 1]);
        return redirect('/subject/index');
    }

    public function restore($subjectID)
    {
        DB::table('subjects')->where('id', $subjectID)->update(['isDelete' => 0]);
        return redirect('/subject/index');
    }
}
