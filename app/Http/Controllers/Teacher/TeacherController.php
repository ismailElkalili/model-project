<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = DB::table('teachers')->select(['id', 'teacher_name', 'teacher_email', 'teacher_phone_number'])->get();
        return view('teacher.index')->with('teachers', $teachers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $levels = DB::table('levels')->get();
        return view('teacher.create')->with('levels', $levels);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('/image', 'public');
        }
        $name = $request['teacher_First_Name'] . " " . $request['teacher_second_Name']
            . " " . $request['teacher_third_Name'] . " " . $request['teacher_Last_Name'];
        DB::table('teachers')->insert([
            'teacher_name' => $name,
            'teacher_email' => $request['email'],
            'teacher_image' => $path,
            'Dob' => $request['dob'],
            'qualification' => $request['qualification'],
            'gender' => $request['gender'],
            'teacher_phone_number' => $request['phone_number'],
            'level_id' => $request['levelID']
        ]);


        return redirect('/teacher/index');
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
    public function edit($teacherId)
    {
        $teacher = DB::table('teachers')->where('id', $teacherId)->first();
        $level = DB::table('levels')->get();


        return view('teacher.edit')->with([
            'teacher' => $teacher,
            'level' => $level

        ]);
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

        $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('/image', 'public');
        }
        $name = $request['teacher_First_Name'] . " " . $request['teacher_second_Name']
            . " " . $request['teacher_third_Name'] . " " . $request['teacher_Last_Name'];
        DB::table('teachers')->where('id', $id)->update([
            'teacher_name' => $name,
            'teacher_email' => $request['email'],
            'teacher_image' => $path,
            'Dob' => $request['dob'],
            'qualification' => $request['qualification'],
            'gender' => $request['gender'],
            'teacher_phone_number' => $request['phone_number'],
            'level_id' => $request['levelID']
        ]);


        return redirect('/teacher/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('teachers')->where('id', $id)->delete();
        return redirect()->back();
    }
}