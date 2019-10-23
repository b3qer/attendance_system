<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Stage;
use App\User;
use App\Url;
use App\Student;
use App\link;


class RegLinkController extends Controller
{
    //
   

    public function ShowLecturerRegister()
    {
        $link = link::where('type','lec')->first();
        if ($link->active == false)
        return view('error');

        $stages = Stage::orderBy('stage')->get();
        return view('monitor.registerlec',['stages' => $stages]);
    }

    protected function create(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string','min:5', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $checkbox = $request['role']=="1"? true : false;
        $stage = Stage::where('id',$request['stage'])->first();
       
        $user =  User::create([
            'username' =>$request['username'],
            'name' => $request['name'],
            'stage_id' => $request['stage'],
            'role' =>  $checkbox,
            'stage' => $stage->stage,
            'group' => $stage->group,
            'password' => Hash::make($request['password']),
        ]);

        Url::create([
            'user_id' => $user->id,
        ]);
        return redirect()->back()->with(['done' => true]); //put return back with variable
       
    }

    public function ShowStudentRegister()
    {
        //put link condition here
        $link = link::where('type','std')->first();
        if ($link->active == false)
        return view('error');

        $stage = Stage::where('id',$link->stg_id)->first();
        return view('monitor.registerstd',['stage' => $stage]);
    }

    protected function createStd(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string','min:5', 'unique:students'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

       
       
        $Student =  Student::create([
            'username' =>$request['username'],
            'name' => $request['name'],
            'stage_id' => $request['stage'],
            'college_no' =>  $request['college_no'],
            'password' => Hash::make($request['password']),
        ]);

        return redirect()->back()->with(['done' => true]); //put return back with variable
       
    }
    public function ShowactiveLec()
    {
        $link = link::where('type','lec')->first();
        return view('monitor.active2',['done'=>$link->active]);
    }
    public function activeLec()
    {
        $link = link::where('type','lec')->first();
        
        if ($link->active == false){
            $link->active = true;
           
        }else{
            $link->active = false;
           
        }
        $link->save();
        return redirect()->back()->with(['done' => $link->active]);
    }
}
