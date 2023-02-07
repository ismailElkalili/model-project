<?php

namespace App\Http\Controllers\Archive;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SubscribitionArchiveController extends Controller
{
    public function indexSubscribionArchive()
    {
        $subscribtion = DB::table('subscribtions')->where('isDelete', 1)->get();
        return view('archive.subscribition_archive')->with('subscribtion', $subscribtion);
    }
    public function archive($subscribitionID)
    {
        DB::table('subscribtions')->where('id', $subscribitionID)->update(['isDelete' => 1]);
        return redirect('/subscribtion/index');
    }

    public function restore($subscribitionID)
    {
        DB::table('subscribtions')->where('id', $subscribitionID)->update(['isDelete' => 0]);
        return redirect('/subscribtion/index');
    }
}
