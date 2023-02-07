<?php

namespace App\Http\Controllers\Archive;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class StdSubsArchiveController extends Controller
{
    public function indexStdSubsArchive()
    {
        return view('archive.std_subs_archive');
    }
    
    public function archive($stdSubsID)
    {
        DB::table('student_subuscribtions')->where('id', $stdSubsID)->update(['isDelete' => 1]);
        return redirect('/student_subuscribtions/index');
    }

    public function restore($stdSubsID)
    {
        DB::table('student_subuscribtions')->where('id', $stdSubsID)->update(['isDelete' => 0]);
        return redirect('/student_subuscribtions/index');
    }

}
