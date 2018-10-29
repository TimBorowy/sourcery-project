<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
        if (Auth::user() == null || Auth::user()->role->name != 'Admin') {
            //return response('Unauthorized.', 401);
            return redirect(route('login'));
        }
        return $next($request);
    }
}
