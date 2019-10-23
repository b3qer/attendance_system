<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Stage;
use App\Url;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    
    protected $redirectTo = '/lecturer/attendance';
   public function redirectTo()
    {
        if (auth()->user()->role) {
            return '/monitor/link'; //redirect to the dashboard
        }  else {
            return '/lecturer/attendance';
           
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string','min:5', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
    public function showRegistrationForm()
    {
        $stages = Stage::orderBy('stage')->get();
        return view('auth.register',['stages' => $stages]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $checkbox = $data['role']=="1"? true : false;
       
        $user =  User::create([
            'username' => $data['username'],
            'name' => $data['name'],
            'stg_id' => $data['stage'],
            'role' =>  $checkbox,
            'password' => Hash::make($data['password']),
        ]);

        Url::create([
            'lec_id' => $user->id,
        ]);
        return $user;
       
    }
    // public function register()
    // {

    // }
}
