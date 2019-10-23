@extends('layouts.sidebar') 
@section('pageTitle', 'Search') 
@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="card w-50">
            <h5 class="card-header">Search</h5>
            <div class="card-body">
                <form action="/lecturer/search" method="post">
                    @csrf
                    <h5 class="card-title">Name :</h5>
                    <input type="text" class="form-control text-right" id="exampleInput1" name="name" placeholder="">
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>

                    <ul class="list-group w-100 my-4">
                        <li class="list-group-item d-flex justify-content-between align-items-center ">
                            Attendance Hours
                            <span class="badge badge-primary badge-pill">{{session()->has('atd')? Session::get('atd') : '0'}}</span>

                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Absence Hours
                            <span class="badge badge-primary badge-pill">{{session()->has('absense')? Session::get('absense') : '0'}}</span>
                        </li>

                    </ul>
                </form>
            </div>

        </div>
    </div>
    <div class="row py-3">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" style="width:70px;">#</th>
                    <th scope="col" style="width:230px;">Name</th>
                    <th scope="col">1</th>
                    <th scope="col">2</th>
                    <th scope="col">3</th>
                    <th scope="col">4</th>
                    <th scope="col">5</th>
                    <th scope="col">6</th>
                    <th scope="col">7</th>
                    <th scope="col">8</th>
                    <th scope="col">9</th>
                    <th scope="col">10</th>

                </tr>
            </thead>
            <tbody>
                @if (session()->has('student'))
                <tr>
                    <th scope="col" style="width:70px;">1</th>
                    <th scope="col" style="width:230px;">{{Session::get('student')->name}}</th>
                    @foreach ($status = Session::get('student')->status->where('user_id',auth()->user()->id)->sortBy('created_at') as $s)
                    <th scope="col" style="width:75px;">
                            @if ($s->status == true)
                            <i class="fas fa-check" style="color:#00b700;"></i> 
                            @else
                            <i class="fas fa-times" style="color:#db0000;"></i>  
                            @endif
                    </th>
                    @endforeach
                </tr>
                @endif {{--
                <th scope="col">0</th>
                <th scope="col">1</th>
                <th scope="col">1</th>
                <th scope="col">1</th>
                <th scope="col">0</th>
                <th scope="col">1</th>
                <th scope="col">1</th>
                <th scope="col">1</th>
                <th scope="col">1</th> --}}

            </tbody>
        </table>
    </div>
    <div class="row justify-content-center py-3">


    </div>
</div>
@endsection
 
@section('details')
<div class="card" style="width: 14rem;">
    <div class="card-body">
        <span class="btn btn-primary w-100">
      No. of students <span class="badge badge-light ml-2">{{$students->count()}}</span>
        </span>
        <br>
        <span class="btn btn-primary w-100 my-3">
      Link Status <span class="badge badge-light ml-4">{{auth()->user()->url->activate? 'True':'False'}}</span>
        </span>


    </div>
</div>
@endsection