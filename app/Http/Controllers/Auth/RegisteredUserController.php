<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function createStudent(): View
    {
        $levels = DB::table('levels')->where('isDelete', 0)->get();
        return view('auth.register-std')->with('levels', $levels);
    }
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function storeStudent(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'gender' => 'required',
            'dob' => 'required|date',
            'levelID' => 'required',
            'phone_number' => 'required',
            'image' => 'required'
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('/image', 'public');
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'is_student' => 0,
            'password' => Hash::make($request->password),
        ]);

        if ($user->exists()) {
            $student = DB::table('students')->insert([
                'student_id' => $user->id,
                'student_image' => $path,
                'student_dob' => $request['dob'],
                'gender' => $request['gender'],
                'student_phone_number' => $request['phone_number'],
                'level_id' => $request['levelID'],
            ]);
        }


        event(new Registered($user));

        Auth::login($user);

        return redirect('/student_profile/' . $user->id);
    }
    //create Teacher Account
    public function createTeacherAccount(): View
    {
        $levels = DB::table('levels')->where('isDelete', 0)->get();
        return view('auth.register-teacher')->with('levels', $levels);
    }
    public function storeTeacher(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'gender' => 'required',
            'dob' => 'required|date',
            'levelID' => 'required',
            'phone_number' => 'required',
            'image' => 'required',
            'qualification' => 'required'
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('/image', 'public');
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'is_student' => 1,
            'password' => Hash::make($request->password),
        ]);

        if ($user->exists()) {
            $student = DB::table('teachers')->insert([
                'teacher_id' => $user->id,
                'teacher_image' => $path,
                'Dob' => $request['dob'],
                'gender' => $request['gender'],
                'qualification' => $request['qualification'],
                'teacher_phone_number' => $request['phone_number'],
                'level_id' => $request['levelID'],
            ]);
        }


        event(new Registered($user));

        Auth::login($user);

        return redirect('/teacher_profile/' . $user->id);
    }
}