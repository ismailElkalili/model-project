<?php

namespace App\Http\Controllers\Subject;

use App\Http\Controllers\Controller;
use App\Http\Requests\LevelRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LevelController extends Controller
{
    
    public function index()
    {
        $levels = DB::table('levels')->where('isDelete', 0)->get();
        return view('level.index')->with('levels', $levels);
    }

    public function create()
    {
        return view('level.create');
    }

   
    public function store(LevelRequest $request)
    {
        DB::table('levels')->insert([
            'name' => $request['level_Name'],
        ]);
        return redirect()->route('indexLevel');
    }

   
    public function edit($levelId)
    {
        
        $level = DB::table('levels')->where('id', $levelId)->first();
        return view('level.edit')->with('level', $level);
    }

    public function update(LevelRequest $request, $levelId)
    {
        DB::table('levels')->where('id', $levelId)->update([
            'name' => $request['level_Name'],
        ]);
        return redirect()->route('indexLevel');
    }

}
