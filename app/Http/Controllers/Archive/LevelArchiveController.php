<?php

namespace App\Http\Controllers\Archive;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class LevelArchiveController extends Controller
{

    public function indexTeacherArchive()
    {
        $levels = DB::table('levels')->where('isDelete', 1)->get();
        return view('archive.level_archive')->with('levels', $levels);
    }
    
    public function archive($levelID)
    {
        DB::table('levels')->where('id', $levelID)->update(['isDelete' => 1]);
        return redirect('/level/index');
    }

    public function restore($levelID)
    {
        DB::table('levels')->where('id', $levelID)->update(['isDelete' => 0]);
        return redirect('/level/index');
    }
}
