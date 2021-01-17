<?php

namespace App\Http\Middleware;

use Closure;
use illuminate\support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class IsAdmin
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
        if (Auth::user() && Auth::user()->roles == 'ADMIN') {
            return $next($request);
        }
        return redirect('/');
    }
}
