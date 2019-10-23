<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if ($guard == "student" && Auth::guard($guard)->check()) {
            return redirect('/student/attendance');
        }
        if (Auth::guard($guard)->check() && $guard == null) {
            if (auth()->user()->role){
            return redirect('/lecturer/attendance');
            } else {
                return redirect('/monitor/lecturers');
            }
            
        }

        return $next($request);
    }
}
