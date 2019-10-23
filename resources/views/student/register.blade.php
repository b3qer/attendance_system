<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            /* background-image: linear-gradient(to bottom, #141e30, #182539, #1c2c42, #20334b, #243b55); */
            background-image: linear-gradient(to top, #233047, #2b3b53, #32455f, #3a516b, #425c78);
            height: 100%;
            margin: 0;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
    </style>
    <title>Attendance Registration</title>
</head>

<body>
        <nav class="navbar navbar-light " style="background-image: linear-gradient(to top, #233047, #2b3b53, #32455f, #3a516b, #425c78);">
                <div class="row justify-content-around">
                        <div class="col-4">
                                <a class="btn btn-info  " href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                     {{ __('Logout') }}
                            </a>
        
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                           
                        </div>
                        <div class="col-4 ">
                                <span class="badge badge-info " style=" height:40px; font-size:20px;">{{$student->name}}</span>
                        </div>
                    </div>
              </nav>
    <div class="container">

        </div>
        <div class="row justify-content-center mt-3 py-3">
            <div class="card w-75 ">
                <h6 class="card-header">Attendance Registration <i class="fas fa-link"></i></h6>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item text-center">

                    <span class="badge badge-info " style=" height:35px; font-size:20px;">Stage: {{$student->stage->stage}}</span>
                        <span class="badge badge-info" style=" height:35px; font-size:20px;">Group: {{$student->stage->group}}</span>
                    </li>
                    @if (Session::has('done'))
                    <li class="list-group-item text-center">

                            <div class="alert alert-success mt-2" role="alert">
                                   Done ! {{Session::get('url')->hour}} Hour
                                  </div>
    
                        </li>
                    @endif
                   <form action="/student/attendance" method="post">
                    @csrf
                    <li class="list-group-item ">
                        <div class="row">
                            <div class="w-75 text-center mx-auto">
                                <label for="validationServer04">Number</label>
                                <input type="text" class="form-control {{$errors->has('number')? 'is-invalid' : ''}} " id="validationServer04" name="number" required>
                                <div class="invalid-feedback">
                                    Please, enter a valid number.
                                </div>
                            </div>
                            {{-- set validation --}}
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <button type="submit" class="btn btn-info w-75 mx-auto">Submit</button>
                        </div>
                    </li>
                </form>
                </ul>
            </div>
        </div>
    </div>

</body>

</html>