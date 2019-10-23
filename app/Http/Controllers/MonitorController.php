<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Stage;
use App\link;
use App\User;
use App\Url;



class MonitorController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('CanAccess');
    }

    public function ShowactiveStd()
    {
        $link = link::where('type','std')->first();
        $stages = Stage::orderBy('stage')->get();
        $stage = Stage::where('id', $link->stg_id)->first();
        return view('monitor.active',['stages' => $stages, 'done' => $link->active,'stage'=> $stage]);
    }

    public function activeStd(Request $request)
    {
       
        $link = link::where('type','std')->first();
        if ($link->active == false){
            $link->active = true;
           $link->stg_id = $request['stage'];
        }else{
            $link->active = false; 
        }
        $link->save();
        $stage = Stage::where('id', $link->stg_id)->first();
        $stages = Stage::orderBy('stage')->get();
        return redirect()->back()->with(['stage'=> $stage, 'done' => $link->active, 'stages' => $stages]);
    }

    public function ShowStages()
    {
        $stages = Stage::orderBy('stage')->get();
        $count = 1;
        return view('monitor.stage2')->with(['stages' => $stages, 'count' => $count]);
    }

    public function AddStages(Request $request)
    {
        Stage::create([
            'stage' => $request['stage'],
            'group' => $request['group'],
        ]);
        return redirect()->back();
    }

    public function DeleteStage($id)
    {
        $stage = Stage::where('id',$id);
        $stage->delete();
        return redirect()->back();
    }

    public function ShowLecForm()
    {
        $users = User::all();
        $stages = Stage::all();
        $count = 1;
        return view('monitor.lecturer',['users'=> $users, 'count'=>$count, 'stages'=> $stages]);
    }
    public function DeleteLec($id)
    {
        $user = User::where('id',$id);
        $link = Url::where('user_id',$id);
        $link->delete();
        $user->delete();
        return redirect()->back();
    }


  
}
