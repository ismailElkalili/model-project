<?php

namespace App\Http\Controllers\Subject;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubjectRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $subjects = DB::table('subjects')->where('isDelete', 0)->get();
        $levels = DB::table('levels')->where('isDelete', 0)->get();
        return view('subject.index')->with('subjects', $subjects)->with('levels', $levels);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $levels = DB::table('levels')->get();
        return view('subject.create')->with('levels', $levels);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubjectRequest $request)
    {
        DB::table('subjects')->insert([
            'subject_name' => $request['subject_name'],
            'level_id' => $request['subject_level'],
        ]);
        return redirect('subject/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($subjectId)
    {
        $subject = DB::table('subjects')->where('id', $subjectId)->first();
        $levels = DB::table('levels')->get();
        return view('subject.edit')->with('levels', $levels)->with('subject', $subject);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubjectRequest $request, $subject_id)
    {
        DB::table('subjects')->where('id', $subject_id)->update([
            'subject_name' => $request['subject_name'],
            'level_id' => $request['subject_level']
        ]);
        return redirect('subject/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('subjects')->where('id', $id)->delete();
        return redirect()->back();
    }
}