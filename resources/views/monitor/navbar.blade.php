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
     body{
                 
        background-image: linear-gradient(to bottom, #2980b9, #2f6f9d, #315e83, #2f4e69, #2c3e50);

                   height: 100%;
                         margin: 0;
                         background-repeat: no-repeat;
                         background-attachment: fixed;
                   /* background-color: #eff4f5; */
             
                 }
    th{
        color: white;
    }
    
    
    </style>


    <title>Title</title>
</head>

<body>

    <div id="add">

        <nav class="navbar navbar-expand-sm navbar-light bg-light">
            <a class="navbar-brand" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item ">
                        <a class="nav-link" href="/monitor/link/student">students Link </a>
                    </li>
                   
                    <li class="nav-item">
                        <a class="nav-link" href="/monitor/link/lecturer">lecturers Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/monitor/lecturers">Lecturer accounts</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/monitor/stage">Add Stage</a>
                    </li>

                    <li class="nav-item ">
                            <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                             {{ __('Logout') }}
                         </a>
                         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>

                  
                </ul>
            </div>
        </nav>
        <main class="py-4">
            @yield('content')
        </main>


    </div>
</body>

</html>