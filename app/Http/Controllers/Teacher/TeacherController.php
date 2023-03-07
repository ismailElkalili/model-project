<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\TeacherRequest;

class TeacherController extends Controller
{
   
    public function index()
    {
        $teachers = DB::table('teachers')->join('users' ,'teachers.teacher_id' , '=' , 'users.id')
        ->where('teachers.isDelete', 0)->get();
       
        return view('teacher.index')->with('teachers', $teachers);
    }

    public function create()
    {
        $levels = DB::table('levels')->get();
        return view('teacher.create')->with('levels', $levels);
    }

    public function store(TeacherRequest $request)
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


        return redirect()->route('indexTeacher');
    }

    
    public function edit($teacherId)
    {
        $teacher = DB::table('teachers')->where('id', $teacherId)->first();
        $level = DB::table('levels')->get();


        return view('teacher.edit')->with([
            'teacher' => $teacher,
            'level' => $level

        ]);
    }

    public function update(TeacherRequest $request, $id)
    {
        $request->validate([
            'image' => 'image|mimes:png,jpg,jpeg|max:2048'
        ]);
        $path = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('/image', 'public');
        }
        $name = $request['teacher_First_Name'] . " " . $request['teacher_second_Name']
            . " " . $request['teacher_third_Name'] . " " . $request['teacher_Last_Name'];

        if (is_null($path)) {
            $path = $request['old_image'];
        }
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


        return redirect()->route('indexTeacher');
    }

    public function destroy($id)
    {
        DB::table('teachers')->where('id', $id)->delete();
        return redirect()->back();
    }
}