<?php

namespace App\Http\Controllers\Exam;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExamRequest;
use Illuminate\Support\Str;
use App\Imports\QuestionsImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = DB::table('classes')->get();
        return view('exam.create')->with('classes', $classes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExamRequest $request)
    {
        $exam_code = Str::random(Str::length($request['exam_name']));
        DB::table('exams')->insert([
            'exam_name' => $request['exam_name'],
            'exam_type' => $request['exam_type'],
            'exam_code' => $exam_code,
            'exam_duration' => $request['exam_duration'],
            'exam_startAt' => $request['exam_startAtDate'],
            'exam_state' => 0,
            'class_id' => $request['exam_class_id'],
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($exam_id)
    {
        $exam = DB::table('exams')->where('id', $exam_id)->first();
        return view('exam.show_exam_details')->with('exam', $exam);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function importView(Request $request, $exam_code)
    {
        return view('question.craete')->with('exam_code', $exam_code);
    }

    public function import(Request $request)
    {
        Excel::import(
            new QuestionsImport,
            $request->file('file')->store('files')
        );

        return redirect()->back();
    }
}