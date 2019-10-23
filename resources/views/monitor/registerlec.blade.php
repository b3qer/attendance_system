

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
                 
                background-image: linear-gradient(to left bottom, #bdc3c7, #96a0a7, #707e89, #4d5d6c, #2c3e50);
                  height: 100%;
                        margin: 0;
                        background-repeat: no-repeat;
                        background-attachment: fixed;
                  /* background-color: #eff4f5; */
            
                }
            
            
            </style>
    <title>Lecturer Register</title>
</head>

<body>
        <div class="container">
                @if (session()->has('done'))
                <div class="row my-3 ">
                        <div class="alert alert-success mx-auto" role="alert">
                                Account created successfully ! , you can sign now from login
                              </div>
            
                </div>
                @endif
                
            
                <div class="row justify-content-center mt-5" >
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header"><h5>Lecturer Register</h5></div>
                            <div class="card-body">
                                <form method="POST" action="/register/lecturer">
                                    @csrf
            
                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}"
                                                required autofocus> @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span> @endif
                                        </div>
                                    </div>
            
                                    <div class="form-group row">
                                        <label for="username" class="col-md-4 col-form-label text-md-right">Username</label>
            
                                        <div class="col-md-6">
                                            <input id="username" type="name" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username"
                                                value="{{ old('username') }}" required> @if ($errors->has('username'))
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('username') }}</strong>
                                                </span> @endif
                                        </div>
                                    </div>
                                    {{-- list --}}
            
                                    <div class="form-group row">
                                        <label for="select" class="col-md-4 col-form-label text-md-right">Stage</label>
            
                                        <div class="col-md-6">
                                            <select class="form-control" id="exampleFormControlSelect1" name="stage">
                                                @foreach ($stages as $stage)
                                                    <option value="{{$stage->id}}">Stage : {{$stage->stage}} , Group : {{$stage->group}}</option>
                                                @endforeach
                                              </select>
                                        </div>
                                    </div>
            
                                    
                                    <div class="form-group row">
                                            <label for="select" class="col-md-4 col-form-label text-md-right">administrator</label>
                
                                            <div class="col-md-6">
                                                <select class="form-control" id="exampleFormControlSelect1" name="role">
                                                   
                                                        <option value="0">Lecturer</option>
                                                        <option value="1">Monitor</option>
                                                    
                                                  </select>
                                            </div>
                                        </div>
            
            
                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                                                required> @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span> @endif
                                        </div>
                                    </div>
                                    
            
                                    <div class="form-group row">
                                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                        </div>
                                    </div>
            
                                   
            
                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary" {{session()->has('done')? 'disabled':''}}>
                                                {{ __('Register') }}
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