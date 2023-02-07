<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Ramsey\Uuid\v1;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = DB::table('students')->where('isDelete', 0)->get();
        $levels = DB::table('levels')->where('isDelete', 0)->get();
        return view('student.index')
            ->with('students', $students)
            ->with('levels', $levels);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $levels = DB::table('levels')->get();
        return view('student.create')->with('levels', $levels);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
    
        if( $request->hasFile('image')){
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
            'level_id' => $request['levelID']
        ]);


        return redirect('/student/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($studentsID)
    {
        $student = DB::table('students')->where('id', '=', $studentsID)->first();
        $levels = DB::table('levels')->get();

        return view('student.edit')
            ->with('student', $student)
            ->with('levels', $levels);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
            'level_id' => $request['levelID']
        ]);
        return redirect('/student/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($studentsID)
    {
        DB::table('students')->where('id', $studentsID)->delete();
        return redirect()->back()->with('mes', "Deleted Succesed");
    }

// public function archive($studentsID)
// {
//     DB::table('students')->where('id', $studentsID)->update(['isDeleted' => 1]);
//     return redirect('/students/index');
// }

// public function restore($studentsID)
// {
//     DB::table('students')->where('id', $studentsID)->update(['isDeleted' => 0]);
//     return redirect('/students/index');
// }
}