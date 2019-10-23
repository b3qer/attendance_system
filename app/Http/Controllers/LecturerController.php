<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Student;
use App\Status;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;



class LecturerController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('lecturer');
    }

    public function ShowLink()
    {
       $user = User::where('id', auth()->user()->id)->first();
       $students = Student::where('stage_id', $user->stage_id)->get();
        return view('lecture.link',['user' => $user ,'students' => $students]);

    }
    public function ActiveLink(Request $request)
    {
        $user = User::where('id', auth()->user()->id)->first();
        $students = Student::where('stage_id', $user->stage_id)->get();
        $url = $user->url;
        $count = 0;
        if ($url->activate == true){
            $url->activate =false;
            $url->number = null;
            $date = Carbon::now();
            $today = $date->todatestring();
            $status = Status::where('user_id' , auth()->user()->id)->where('created_at' , 'like' , $today.'%')->get();
            foreach ($status as $s) {
                if ($s->status == true){
                    $count++;
                }
            }

        }
        else {
            $url->activate = true;
            $url->hour = $request['hour'];
            $url->number = $request['number'];

            foreach ($students as $student) {
                Status::create([
                    'student_id' => $student->id,
                    'user_id' => $user->id,
                    'hour' => $request['hour'],
                ]);
            }

        }
        $url->save();
        return redirect()->back()->with(['user'=>$user, 'url'=>$url , 'count' =>$count]);
    }

    public function ShowTable()
    {
        $students = Student::where('stage_id', auth()->user()->stage_id)->orderBy('name')->get();
        $statuses = Status::where('user_id', auth()->user()->id)->get();
        $count = 1;
        if ($students == null) {
            $checkStd = false;
        }
        else {
            $checkStd = true;
        }
        if ($statuses == null){
            $check = false;
        }else {
            $check = true;
        }

        return view('lecture.tables', ['students'=> $students,  'count' => $count, 
                                       'check' => $check , 'checkStd' => $checkStd]);
    }

    public function ShowSearch()
    {
        $students = Student::where('stage_id', auth()->user()->stage_id)->get();
        return view('lecture.search' , ['students' => $students]);
    }

    public function SearchStd(Request $request)
    {
       
        $students = Student::where('stage_id', auth()->user()->stage_id)->get();
        $std = $students->where('name', $request['name'])->first();
        $status = Status::where('student_id', $std->id)->where('user_id', auth()->user()->id )->get();

        $atd = 0;
        $abs = 0;
        foreach ($status as $s) {
            if($s->status){
                if($s->hour == '1'){
                    $atd += 1;
                }
                else {
                    $atd += 2;
                }
            }
            else {
                if($s->hour == '1'){
                    $abs += 1;
                }
                else {
                    $abs += 2;
                }
            }
        }
       //return view('lecture.search')->with(['student'=>$std]);
       return redirect()->back()->with(['student'=>$std, 'atd'=>$atd, 'absense'=>$abs]);
    }

    public function ShowReport()
    {
        $students = Student::where('stage_id', auth()->user()->stage_id)->orderBy('name')->get();
        $atds = array();
        $abns = array();
        $count = 0;
        for ($i=0;$i< count($students); $i++){
            $atds[$i]=0;
            $abns[$i]=0;
        }
        foreach ($students as $student) {
            
            $status = $student->status->where('user_id',auth()->user()->id);
            foreach ($status as $s) {
                if($s->status){
                    if($s->hour == '1'){
                        $atds[$count] += 1;
                    }
                    else {
                        $atds[$count] += 2;
                    }
                }
                else {
                    if($s->hour == '1'){
                        $abns[$count] += 1;
                    }
                    else {
                        $abns[$count] += 2;
                    } 
                }
            }
            $count++;
        }
        $c = 1;
        return view('lecture.reports', ['students'=>$students , 'attendance'=>$atds, 'absence'=>$abns, 'count'=>$c]);
    }

    public function ShowEdit()
    {
        $students = Student::where('stage_id', auth()->user()->stage_id)->orderBy('name')->get();
        $statuses = Status::where('user_id', auth()->user()->id)->get();
        
        $count = 1;
        
        if ($students == null) {
            $checkStd = false;
        }
        else {
            $checkStd = true;
        }
        if ($statuses == null){
            $check = false;
        }else {
            $check = true;
        }
       
       // $number = $students->first()->status->count();
        $number = $students->first()->status->where('user_id',auth()->user()->id)->count();
        
        return view('lecture.edit', ['students'=> $students,  'count' => $count,
                                       'check' => $check , 'checkStd' => $checkStd , 'number'=>$number]);
    }

    public function DeleteRow(Request $request)
    {
      
       $student = Student::where('id' , $request['id'])->first();
       $status = $student->status;
       foreach ($status as $s) {
        $s->delete();
       }
       $student->delete();   
       return redirect()->back();

    }

    public function EditName(Request $request)
    {
        $student = Student::where('id' , $request['id'])->first();
        
      if ($request['status'] == null){
            $student->name = $request['name'];
            $student->save();
      } else {
           
            $status = $student->status;
            $ordered = $status->where('user_id',auth()->user()->id)-> sortbydesc('created_at')->first();
            $ordered->status = $request['status'];
            $ordered->save();  
      }
       return redirect()->back();
    }

    public function DeleteBtn(Request $request)
    {
        $students = Student::where('stage_id' , auth()->user()->stage_id)->get();
        if ($request['info'] == '2') {
            foreach ($students as $student) {
                $statuses = $student->status;
                $status = $statuses->where('user_id',auth()->user()->id);
               foreach ($status as $s) {
                   $s->delete();
               }
               $student->delete();
            }
        }
        else {
            foreach ($students as $student) {
                $statuses = $student->status;
                $status = $statuses->where('user_id',auth()->user()->id);
               foreach ($status as $s) {
                   $s->delete();
               }
            }
        }
        return redirect()->back();
    }

    public function xlsx()
    {
        $students = Student::where('stage_id', auth()->user()->stage_id)->orderBy('name')->get();
        $statuses = Status::where('user_id', auth()->user()->id)->get();
        $count = 1;
        $index = 0;
        $userData = array(array());
        foreach ($students as $student) {
            $userData[$index] = [
                '#' => $count++,
                'Name' => $student->name,
            ];
            $i=0;
            $status = $student->status->where('user_id',auth()->user()->id)->sortBy('created_at');
            foreach ($status as $s) {
                $userData[$index][$i+1]  = $s->status?'1':'0';
                $i++;
            }
            $index++;
        }
        Excel::create('Attendace', function ($excel) use ($userData) {
            $excel->sheet('sheet1', function ($sheet) use ($userData) {
                $sheet->fromArray($userData);
            });
        })->download('xlsx');
        return redirect()->back();
    }
    public function xlsx2()
    {

        $students = Student::where('stage_id', auth()->user()->stage_id)->orderBy('name')->get();
        $atds = array();
        $abns = array();
        $count = 0;
        for ($i=0;$i< count($students); $i++){
            $atds[$i]=0;
            $abns[$i]=0;
        }
        foreach ($students as $student) {
            
            $status = $student->status->where('user_id',auth()->user()->id);
            foreach ($status as $s) {
                if($s->status){
                    if($s->hour == '1'){
                        $atds[$count] += 1;
                    }
                    else {
                        $atds[$count] += 2;
                    }
                }
                else {
                    if($s->hour == '1'){
                        $abns[$count] += 1;
                    }
                    else {
                        $abns[$count] += 2;
                    } 
                }
            }
            $count++;
        }

        $count = 1;
        $index = 0;
        foreach ($students as $student) {
            $userData[$index] = [
                '#' => $count++,
                'Name' => $student->name,
                'Attendance Hours' => $atds[$index],
                'Absence Hours' => $abns[$index],
            ];
        }
        Excel::create('Report', function ($excel) use ($userData) {
            $excel->sheet('sheet1', function ($sheet) use ($userData) {
                $sheet->fromArray($userData);
            });
        })->download('xlsx');
        return redirect()->back();
    }
}
