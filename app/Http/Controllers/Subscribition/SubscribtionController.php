<?php

namespace App\Http\Controllers\Subscribition;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubscribtionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscribtion = DB::table('subscribtions')->get();
        return view('subscribition.index')->with('subscribtion',$subscribtion);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subscribition.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        DB::table('subscribtions')->insert([
            'subscribtion_plan' => $request['subscribtionPlan']
        ]);
        return redirect()->action([SubscribtionController::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($subscribtionID)
    {
     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($subscribtionID)
    {
        $subscribtion = DB::table('subscribtions')->where('id', '=', $subscribtionID)->first();
        return view('subscribition.edit')
             ->with('subscribtion', $subscribtion);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $subscribtionID)
    {
        DB::table('subscribtions')->where('id', '=', $subscribtionID)->update([
            'subscribtion_plan' => $request['subscribtionPlan']
        ]);  
        return redirect('/subscribtions/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($subscribtionID)
    {
        DB::table('subscribtions')->where('id', $subscribtionID)->delete();
        return redirect()->back();
    }

    // public function archive($subscribtionID)
    // {
    //     DB::table('subscribtions')->where('id', $subscribtionID)->update(['isDeleted' => 1]);
    //     return redirect('/subscribtions/index');
    // }

    // public function restore($id)
    // {
    //     DB::table('subscribtions')->where('id', $id)->update(['isDeleted' => 0]);
    //     return redirect('/subscribtions/index');
    // }
}
