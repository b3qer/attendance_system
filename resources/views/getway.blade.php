<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ URL::asset('css/main.css') }} ">
   
    <title>Main</title>
</head>
<body>
    <div class="middle">
        <a class="btn" href="/login">
                <i class="fas fa-user-tie"></i>
        </a>
        <a class="btn" href="/login/student">
                <i class="fas fa-user-graduate"></i>
        </a>
    </div>
</body>
</html>

@section('content')


@endsection