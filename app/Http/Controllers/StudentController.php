<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use Auth;
use App\Url;

class StudentController extends Controller
{
    //

    public function ShowForm()
    {
       
        $student = Student::where('id' , Auth::guard('student')->id())->first();
        return view('student.register' , ['student' => $student]);
    }
    public function CheckNum(Request $request)
    {
        $number = $request['number'];
        $url = Url::where('number' , $number)->first();
        // dd($url);
        if ($url == null){
            return redirect()->back()->withErrors(['number' => ['Please, write correct number']]);
        }else {
            $student = Student::where('id' , Auth::guard('student')->id())->first();
            $status = $student->status->where('user_id' , $url->user_id)->sortbydesc('created_at')->first();
           $status->status = true;
           $status->save();
            return redirect()->back()->with(['done'=>true , 'url' => $url]);
        }
    }
}
