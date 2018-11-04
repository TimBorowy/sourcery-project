<?php

namespace App\Http\Middleware;

use App\Link;
use Closure;
use Illuminate\Support\Facades\Auth;

class CanVote
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
        $linksCount = Auth::user()->links->count();

        if($linksCount >= 5){

            return $next($request);
        }

        return redirect(route('rules'));
    }
}
