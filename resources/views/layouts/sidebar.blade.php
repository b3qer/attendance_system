<!DOCTYPE html>
<html lang="en">

<head>

  <link rel="icon" href="{{URL::asset('icon/myclass.png')}}" sizes="32x32" type="image/png"> 

  <meta charset="utf-8">
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
    crossorigin="anonymous">

  <title>@yield('pageTitle')</title>

  <!-- Bootstrap core CSS -->
  <link href="{{URL::asset('vendor/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="{{URL::asset('css/simple-sidebar.css')}}" rel="stylesheet">
  <style>
    body{
      /* background-image: linear-gradient(to bottom, #b1b6c3, #bac0cc, #c4c9d5, #cdd3df, #d7dde8); */
      background-image: linear-gradient(to bottom, #eff4f5, #ebf1f2, #e7edef, #e3eaeb, #dfe7e8);
      height: 100%;
            margin: 0;
            background-repeat: no-repeat;
            background-attachment: fixed;
      /* background-color: #eff4f5; */

    }
    .list-group {
      background-color: #242765;
    }
    #the-items a{
      font-size: 20px;
      padding-left: 60px;
    }
  </style>
</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading text-center" style="background-color:#418CCB; color:#F4F2EF;"><i class="fas fa-address-book mr-3"></i> My Class </div>
      <div class="list-group list-group-flush" id="the-items">
        <a href="/lecturer/attendance" class="list-group-item list-group-item-action bg-light"><i class="fas fa-users"></i> Attendance</a>
        <a href="/lecturer/search" class="list-group-item list-group-item-action bg-light"><i class="fas fa-search"></i> Search</a>
        <a href="/lecturer/report" class="list-group-item list-group-item-action bg-light"><i class="fas fa-file-alt"></i> Reports</a>
        <a href="/lecturer/edit" class="list-group-item list-group-item-action bg-light"><i class="fas fa-user-edit"></i> Edit table</a>
        <a href="/lecturer/link" class="list-group-item list-group-item-action bg-light"><i class="fas fa-link"></i> Link</a>
        <a href="#" class=""></a>
      </div>
      <div class="row mx-auto" style="width: 14rem; height: ">
        <main class="py-4">
          @yield('details')
        </main>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom" >
        <button class="btn btn-primary" id="menu-toggle">Toggle Menu</button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
          aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
             {{-- My edit --}}
            <li class="nav-item active mr-3">
              <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
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
    <!-- /#page-content-wrapper -->

  </div>

  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
  <script src="{{URL::asset('vendor/jquery.min.js')}}"></script>
  <script src="{{URL::asset('vendor/bootstrap.bundle.min.js')}}"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>