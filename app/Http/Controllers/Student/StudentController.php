<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{

    public function index()
    {
        $students = DB::table('students')->join('users', 'students.student_id', '=', 'users.id')
            ->where('students.isDelete', 0)->get();
        $levels = DB::table('levels')->where('isDelete', 0)->get();
        return view('student.index', ['students' => $students, 'levels' => $levels]);
    }


    public function create()
    {
        $levels = DB::table('levels')->get();
        return view('student.create', ['levels' => $levels]);
    }


    public function store(StudentRequest $request)
    {

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('/image', 'public');
        }
        $name = $request['student_First_Name'] . " " . $request['student_Father_Name']
            . " " . $request['student_Grandfather_Name'] . " " . $request['student_Last_Name'];
        DB::table('students')->insert([
            'student_name' => $name,
            'student_email' => $request['email'],
            'student_image' => $path,
            'student_dob' => $request['dob'],
            'gender' => $request['gender'],
            'student_phone_number' => $request['phone_number'],
            'level_id' => $request['levelID'],
        ]);

        return redirect()->route('indexStudents');
    }


    public function edit($studentsID)
    {
        $student = DB::table('students')->where('id', '=', $studentsID)->first();
        $levels = DB::table('levels')->get();

        return view('student.edit', ['student' => $student, 'levels' => $levels]);
    }


    public function update(Request $request, $studentsID)
    {

        $name = $request['student_First_Name'] . " " . $request['student_Father_Name']
            . " " . $request['student_Grandfather_Name'] . " " . $request['student_Last_Name'];

        DB::table('students')->where('id', '=', $studentsID)->update([
            'student_name' => $name,
            'student_email' => $request['email'],
            'student_dob' => $request['dob'],
            'gender' => $request['gender'],
            'student_phone_number' => $request['phone_number'],
            'level_id' => $request['levelID'],
        ]);
        return redirect()->route('indexStudents');
    }


}