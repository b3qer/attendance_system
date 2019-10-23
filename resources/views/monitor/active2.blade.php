@extends('monitor.navbar') 
@section('content')
<div class="container">
    @if ($done)
    <div class="row justify-content-center mt-5">

        <div class="card w-50 mt-4">
            <h5 class="card-header">Activate Lecturers Link <i class="fas fa-link"></i></h5>
            <ul class="list-group list-group-flush">
                <li class="list-group-item mx-auto">
                    <div class="row ">
                        <h5>Click deactivate to disable lecturers link</h5>
                    </div>
                </li>
                <li class="list-group-item mx-auto">
                    <div class="row ">
                        <a href="/register/lecturer" class="btn btn-primary" TARGET="_blank">Go to register page</a>
                    </div>
                </li>
                <li class="list-group-item">
                    <form action="/monitor/link/lecturer" method="post">
                        @csrf
                        <div class="row">
                            <button type="submit" class="btn btn-warning w-75 mx-auto">Deactivate</button>
                        </div>
                    </form>
                </li>
            </ul>
        </div>

    </div>

</div>


@else

<div class="row justify-content-center mt-5">

    <div class="card w-50 mt-4">
        <h5 class="card-header">Activate Lecturers Link <i class="fas fa-link"></i></h5>
        <ul class="list-group list-group-flush">

            <li class="list-group-item mx-auto">
                <div class="row ">
                    <h5>You Can Activate Lecturers link from here</h5>
                </div>
            </li>

            <li class="list-group-item">
                <form action="/monitor/link/lecturer" method="post">
                    @csrf
                    <div class="row">
                        <button type="submit" class="btn btn-success w-75 mx-auto">Activate</button>

                    </div>
                </form>
            </li>
        </ul>
    </div>

</div>

@endif
@endsection