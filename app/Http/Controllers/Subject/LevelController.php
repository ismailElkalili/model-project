<?php

namespace App\Http\Controllers\Subject;

use App\Http\Controllers\Controller;
use App\Http\Requests\LevelRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $levels = DB::table('levels')->get();
        return view('level.index')->with('levels', $levels);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('level.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LevelRequest $request)
    {
        DB::table('levels')->insert([
            'name' => $request['level_Name'],
        ]);
        return redirect('/level/index');
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
    public function edit($levelId)
    {
        //
        $level = DB::table('levels')->where('id', $levelId)->first();
        return view('level.edit')->with('level', $level);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LevelRequest $request, $levelId)
    {
        DB::table('levels')->where('id', $levelId)->update([
            'name' => $request['level_Name'],
        ]);
        return redirect('/level/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($levelId)
    {
        DB::table('levels')->where('id', $levelId)->delete();
        return redirect('/level/index');
    }

    public function archive($levelId)
    {
        DB::table('levels')->where('id', $levelId)->update(['isDelete' => 1]);
        return redirect('/levels/index');
    }

    public function restore($levelId)
    {
        DB::table('levels')->where('id', $levelId)->update(['isDelete' => 0]);
        return redirect('/levels/index');
    }

}
