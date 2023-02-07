<?php

namespace App\Http\Controllers\Subscribition;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubscribtionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isTrue;

class SubscribtionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscribtion = DB::table('subscribtions')->where('isDelete', 0)->get();
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
    public function store(SubscribtionRequest $request)
    {
       
        if(DB::table('subscribtions')->insert([
            'subscribtion_plan' => $request['subscribtionPlan']
        ])){
            
            return redirect('/subscribtion/index')->with('mes',"Add Succesed");
        }else{

            return redirect('/subscribtion/create')->with('mes',"Add Succesed");
        }
       
        
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
        return redirect('/subscribtion/index');
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
        return redirect()->back()->with('mes',"Deleted Succesed");
    }

}
