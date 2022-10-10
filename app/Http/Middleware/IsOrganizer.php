<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;

class IsOrganizer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->is_organizator() && !auth()->user()->is_routesetter())
        {
            return $next($request);
        }
        return redirect(RouteServiceProvider::HOME);
    }
}
