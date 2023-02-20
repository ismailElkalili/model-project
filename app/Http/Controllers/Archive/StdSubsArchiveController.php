<?php

namespace App\Http\Controllers\Archive;

use App\Http\Controllers\Controller;
use App\Http\Controllers\methoeds\MakeIsDeleted;
use Illuminate\Support\Facades\DB;

class StdSubsArchiveController extends Controller
{
    public function indexStdSubsArchive()
    {
        return view('archive.std_subs_archive');
    }

    // public function archive($stdSubsID)
    // {
    //     MakeIsDeleted::makeIsDelete('student_subuscribtions', $stdSubsID, 1);
    //     return redirect()->route('');
    // }

    // public function restore($stdSubsID)
    // {
    //     MakeIsDeleted::makeIsDelete('student_subuscribtions', $stdSubsID, 0);
    //     return redirect()->route('');
    // }

    public function destroy($stdSubsID)
    {
        DB::table('student_subuscribtions')->where('id', $stdSubsID)->delete();
        return redirect()->back()->with('mes', "Deleted Succesed");
    }

}
