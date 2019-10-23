<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/home';
   

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:student')->except('logout');
        // if (auth()->role == true){
            
        // }
    }
    public function showStudentLoginForm()
    {
        return view('auth.login', ['url' => 'student']);
    }
    public function studentLogin(Request $request)
    {
        
        $this->validate($request, [
            'username'   => 'required',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('student')->attempt(['username' => $request->username, 'password' => $request->password])) {
            
            return redirect()->intended('/student/attendance');

        }
       
        return back()->withErrors(['username' => ['Please, write correct username']]);
    }
    public function login(Request $request)
    {
        //dd($request);
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            // return redirect('/lecturer/attendance');

            if (auth()->user()->role) {
                return redirect('/monitor/link/student'); //redirect to the dashboard
            }  else {
                return redirect('/lecturer/attendance');
               
            }
        }
        return back()->withErrors(['username' => ['Please, write correct username']]);
     
    }

}
