<?php

namespace App\Http\Controllers\Subject;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ClassRequest;
use Illuminate\Support\Facades\DB;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = DB::table('classes')->where('isDelete', 0)->get();
        $teachers = DB::table('teachers')->get();
        $subjects = DB::table('subjects')->get();
        return view('class.index')
            ->with('classes', $classes)
            ->with('teachers', $teachers)
            ->with('subjects', $subjects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $teachers = DB::table('teachers')->get();
        $subjects = DB::table('subjects')->get();
        return view('class.create')
            ->with('teachers', $teachers)
            ->with('subjects', $subjects);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClassRequest $request)
    {
        $subIDAndLevelID = explode('|', $request['subjectID']);
        $teachers = DB::table('teachers')->get();
        $subjects = DB::table('subjects')->get();

        $classes = DB::table('classes')->insert([
            'class_name' => $request['classesName'],
            'state' => $request['state'],
            'teacher_id' => $request['teacherID'],
            'subject_id' => $subIDAndLevelID[0],
            'level_id' => $subIDAndLevelID[1],
        ]);

        return redirect('/classes/index')
            ->with('classes', $classes)
            ->with('teachers', $teachers)
            ->with('subjects', $subjects);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($classID)
    {
        $classes = DB::table('classes')->where('id', $classID)->first();
        $teachers = DB::table('teachers')->get();
        $subjects = DB::table('subjects')->get();
        return view('class.edit')
            ->with('classes', $classes)
            ->with('teachers', $teachers)
            ->with('subjects', $subjects);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClassRequest $request, $classID)
    {
        $teachers = DB::table('teachers')->get();
        $subjects = DB::table('subjects')->get();

        $classes = DB::table('classes')->where('id', $classID)->update([
            'class_name' => $request['classesName'],
            'state' => $request['state'],
            'teacher_id' => $request['teacherID'],
            'subject_id' => $request['subjectID'],
        ]);

        return redirect('/classes/index')
            ->with('classes', $classes)
            ->with('teachers', $teachers)
            ->with('subjects', $subjects);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($classID)
    {
        DB::table('classes')->where('id', $classID)->delete();
        return redirect()->back()->with('mes', "Deleted Succesed");
    }


}