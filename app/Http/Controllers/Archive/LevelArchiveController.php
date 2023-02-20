<?php

namespace App\Http\Controllers\Archive;

use App\Http\Controllers\Controller;
use App\Http\Controllers\methoeds\MakeIsDeleted;
use Illuminate\Support\Facades\DB;

class LevelArchiveController extends Controller
{

    public function indexTeacherArchive()
    {
        $levels = DB::table('levels')->where('isDelete', 1)->get();
        return view('archive.level_archive', ['levels' => $levels]);
    }

    public function archive($levelID)
    {
        MakeIsDeleted::makeIsDelete('levels', $levelID, 1);
        return redirect()->route('indexLevel');
    }

    public function restore($levelID)
    {
        MakeIsDeleted::makeIsDelete('levels', $levelID, 0);
        return redirect()->route('indexLevel');
    }
    public function destroy($classID)
    {
        DB::table('levels')->where('id', $classID)->delete();
        return redirect()->back()->with('mes', "Deleted Succesed");
    }
}
