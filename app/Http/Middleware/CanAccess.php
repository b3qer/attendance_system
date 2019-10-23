<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CanAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            if (Auth::user()->role == true) {
                return $next($request);
            }
         }
        return redirect()->back();
    }
}
