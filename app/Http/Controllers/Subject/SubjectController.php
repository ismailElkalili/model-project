<?php

namespace App\Http\Controllers\Subject;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubjectRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{

    public function index()
    {
        $subjects = DB::table('subjects')->where('isDelete', 0)->get();
        $levels = DB::table('levels')->where('isDelete', 0)->get();
        return view('subject.index')->with('subjects', $subjects)->with('levels', $levels);
    }

    public function create()
    {
        $levels = DB::table('levels')->get();
        return view('subject.create')->with('levels', $levels);
    }

    public function store(SubjectRequest $request)
    {
        DB::table('subjects')->insert([
            'subject_name' => $request['subject_name'],
            'level_id' => $request['subject_level'],
        ]);
        return redirect()->route('indexSubject');
    }

    public function edit($subjectId)
    {
        $subject = DB::table('subjects')->where('id', $subjectId)->first();
        $levels = DB::table('levels')->get();
        return view('subject.edit')->with('levels', $levels)->with('subject', $subject);
    }

   
    public function update(SubjectRequest $request, $subject_id)
    {
        DB::table('subjects')->where('id', $subject_id)->update([
            'subject_name' => $request['subject_name'],
            'level_id' => $request['subject_level']
        ]);
        return redirect()->route('indexSubject');
    }

    public function destroy($id)
    {
        DB::table('subjects')->where('id', $id)->delete();
        return redirect()->back();
    }
}