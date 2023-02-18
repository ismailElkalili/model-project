<?php

namespace App\Http\Controllers\Archive;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClassArchiveController extends Controller
{
   

    public function indexClassArchive()
    {
        $classes = DB::table('classes')->where('isDelete', 1)->get();
        $teachers = DB::table('teachers')->get();
        $subjects = DB::table('subjects')->get();
        return view('archive.class_archive')
        ->with('classes', $classes)
        ->with('teachers', $teachers)
        ->with('subjects', $subjects);
    }

    public function archive($classID)
    {
        DB::table('classes')->where('id', $classID)->update(['isDelete' => 1]);
        return redirect()->route('indexClasses');
    }

    public function restore($classID)
    {
        DB::table('classes')->where('id', $classID)->update(['isDelete' => 0]);
        return redirect()->route('indexClasses');
    }

    public function destroy($classID)
    {
        DB::table('classes')->where('id', $classID)->delete();
        return redirect()->back()->with('mes', "Deleted Succesed");
    }
}
