<?php

namespace App\Http\Controllers\Archive;

use App\Http\Controllers\Controller;
use App\Http\Controllers\methoeds\MakeIsDeleted;
use Illuminate\Support\Facades\DB;

class SubscribitionArchiveController extends Controller
{
    public function indexSubscribionArchive()
    {
        $subscribtion = DB::table('subscribtions')->where('isDelete', 1)->get();
        return view('archive.subscribition_archive', ['subscribtion' => $subscribtion]);
    }
    public function archive($subscribitionID)
    {
        MakeIsDeleted::makeIsDelete('subscribtions', $subscribitionID, 1);
        return redirect()->route('indexSubscribtion');
    }

    public function restore($subscribitionID)
    {
        MakeIsDeleted::makeIsDelete('subscribtions', $subscribitionID, 0);
        return redirect()->route('indexSubscribtion');
    }
    public function destroy($subscribitionID)
    {
        DB::table('subscribtions')->where('id', $subscribitionID)->delete();
        return redirect()->back()->with('mes', "Deleted Succesed");
    }
}
