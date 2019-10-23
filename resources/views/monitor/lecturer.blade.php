@extends('monitor.navbar') 
@section('content')



<div class="container">

    <div class="row mt-5 ">
        <table class="table w-75 mx-auto">
            <thead>
                <tr>
                    <th scope="col" style="width:70px;">#</th>
                    <th scope="col" style="width:230px;">Name</th>
                    <th scope="col" style="width:230px;">Username</th>
                    <th scope="col" style="width:230px;">Role</th>
                    <th scope="col" style="width:230px;">Stage</th>
                    <th scope="col" style="width:230px;">Group</th>
                    <th scope="col" style="width:230px;">Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($users as $user)
                @if ($user->id != auth()->user()->id)
                <tr>
                    <th scope="col" style="width:70px;">{{$count++}}</th>
                    <th scope="col" style="width:230px;">{{$user->name}}</th>
                    <th scope="col" style="width:230px;">{{$user->username}}</th>
                    <th scope="col" style="width:230px;">{{$user->role?'Mointor':'Lecturer'}}</th>
                    <th scope="col" style="width:230px;">{{$user->stage}}</th>
                    <th scope="col" style="width:230px;">{{$user->group}}</th>
                    <th scope="col" style="width:230px;"> <a href="/monitor/lecturer/delete/{{$user->id}}" data-toggle="modal" class="badge badge-danger delete"
                            data-id="2"><i class="fas fa-trash-alt"></i> Delete</a></th>
                </tr>
                @endif
                
                @endforeach
            </tbody>
        </table>
    </div>
@endsection