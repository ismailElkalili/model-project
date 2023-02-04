<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
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
        $students = DB::table('students')->get();
        $levels = DB::table('levels')->get();
        return view('student.index')
        ->with('students', $students)
        ->with('levels',$levels);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $levels = DB::table('levels')->get();
        return view('student.create')->with('levels',$levels);
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
        if( $request->hasFile('image')){
            $file = $request->file('image');
            $path =$file->store('/image' , 'public'); 
        }
        $name = $request['student_First_Name'] . " " . $request['student_Father_Name']
        . " " . $request['student_Grandfather_Name'] . " " . $request['student_Last_Name'];
        DB::table('students')->insert([
            'student_name' => $name,
            'student_email' => $request['email'],
            'student_image' =>$path,
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
    public function profile($studentID)
    {
        $query='SELECT s.* FROM `subjects` AS s WHERE (
            s.id IN (
                SELECT c.subject_id FROM `classes` AS c WHERE c.subject_id = s.id AND
                    (
                         c.id IN (
                             SELECT std_s.class_id FROM `std_classes` AS std_s WHERE std_s.class_id = c.id AND std_s.student_id = '.$studentID.'
                         )
                     )
            )
        )';
        $student = DB::table('students')->where('id', '=', $studentID)->first();
        $level = DB::table('levels')->where('id', $student->level_id)->first();
        $studentClasses = DB::select($query);
        return view('student.profile')
            ->with('student', $student)
            ->with('level', $level)
            ->with('studentClasses', $studentClasses);
    }

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
        return redirect()->back()->with('mes',"Deleted Succesed");
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
