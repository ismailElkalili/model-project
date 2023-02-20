<?php

namespace App\Http\Controllers\Subscribition;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubscribtionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isTrue;

class SubscribtionController extends Controller
{

    public function index()
    {
        $subscribtion = DB::table('subscribtions')->where('isDelete', 0)->get();
        return view('subscribition.index')->with('subscribtion',$subscribtion);
    }

    public function create()
    {
        return view('subscribition.create');
    }

    public function store(SubscribtionRequest $request)
    {
       
        if(DB::table('subscribtions')->insert([
            'subscribtion_plan' => $request['subscribtionPlan']
        ])){
            
            return redirect()->route('indexSubscribtion')->with('mes',"Add Succesed");
        }else{

            return redirect()->route('indexSubscribtion')->with('mes',"Add Succesed");
        }
       
        
    }

    public function edit($subscribtionID)
    {
        $subscribtion = DB::table('subscribtions')->where('id', '=', $subscribtionID)->first();
        return view('subscribition.edit')
             ->with('subscribtion', $subscribtion);
    }

    public function update(Request $request, $subscribtionID)
    {
        DB::table('subscribtions')->where('id', '=', $subscribtionID)->update([
            'subscribtion_plan' => $request['subscribtionPlan']
        ]);  
        return redirect()->route('indexSubscribtion');
    }

    public function destroy($subscribtionID)
    {
        DB::table('subscribtions')->where('id', $subscribtionID)->delete();
        return redirect()->back()->with('mes',"Deleted Succesed");
    }

}
