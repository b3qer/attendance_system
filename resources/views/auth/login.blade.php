<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
   @isset($url)
       <title>Student Login</title>
       @else
       <title>Lecturer Login</title>
   @endisset
</head>
<body>
    <nav class="navbar navbar-light  " style="background-image: linear-gradient(to right, #2980b9, #2f6f9d, #315e83, #2f4e69, #2c3e50);">
        @isset($url)
        <span class="navbar-brand mb-0 h1 mx-auto" style="color: #F4F2EF;">Student Login</span>
                    @else
                    <span class="navbar-brand mb-0 h1 mx-auto" style="color: #F4F2EF;">Lecturer Login</span>
                    @endisset
       
      </nav>
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header text-center" style="background-color:#efefef;">
                    @isset($url)
                    <i class="fas fa-user-graduate" style="font-size:50px; color: #3F5D95;"></i>
                    @else
                    <i class="fas fa-user-tie" style="font-size:50px; color: #3F5D95;"></i> 
                    @endisset
                </div>

                <div class="card-body">
                    @isset($url)
                        <form method="POST" action='{{ url("login/$url") }}' aria-label="{{ __('Login') }}" >
                        @else
                        <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                     @endisset
                        @csrf

                        <div class="form-group row">

                            <label for="email" class="col-md-4 col-form-label text-md-right">Username</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn " style="color:#F4F2EF ; background-color:#3F5D95;">
                                    {{ __('Login') }}
                                </button>

                               
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>