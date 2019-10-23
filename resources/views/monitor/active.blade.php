@extends('monitor.navbar') 
@section('content')
<div class="container">
    @if ($done)
    <div class="row justify-content-center mt-5">

        <div class="card w-50 mt-4">
            <h5 class="card-header">Activation <i class="fas fa-link"></i></h5>
            <ul class="list-group list-group-flush">

                <li class="list-group-item ">
                    <div class="row">
                        <div class="form-group w-75 mx-auto">
                            <label for="exampleFormControlSelect1">Choose Stage :</label>
                            <select class="form-control" id="exampleFormControlSelect1" disabled>
                            <option>Stage : {{$stage->stage}} , Group : {{$stage->group}}</option>
                                         
                             </select>

                        </div>
                    </div>
                </li>
                <li class="list-group-item ">
                    
                        <div class="form-group text-center mt-3">
                            <a href="/register/student" class="btn btn-primary" TARGET="_blank">Go to register page</a>
                        </div>
                
                </li>
               
                <form action="/monitor/link/student" method="post">
                    @csrf
                    <li class="list-group-item">
                        <div class="row">
                            <button type="submit" class="btn btn-warning w-75 mx-auto">Deactive</button>
                        </div>
                    </li>
                </form>
            </ul>
        </div>

    </div>

</div>
@else
<div class="row justify-content-center mt-5">

    <div class="card w-50 mt-4">
        <h5 class="card-header">Activation <i class="fas fa-link"></i></h5>
        <ul class="list-group list-group-flush">
            <form action="/monitor/link/student" method="post">
                @csrf
                <li class="list-group-item ">

                    <div class="row">
                        <div class="form-group w-75 mx-auto">
                            <label for="exampleFormControlSelect1">Choose Stage :</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="stage">
                                @foreach ($stages as $stage)
                            <option value="{{$stage->id}}">Stage : {{$stage->stage}} , Group : {{$stage->group}}</option>
                                @endforeach
                                          
                                         
                      </select>
                        </div>
                    </div>
                </li>

                <li class="list-group-item">
                    <div class="row">
                        <button type="submit" class="btn btn-success w-75 mx-auto">Active</button>
                    </div>
                </li>
            </form>
        </ul>
    </div>

</div>

@endif
@endsection