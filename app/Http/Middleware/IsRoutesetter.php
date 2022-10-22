<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;

class IsRoutesetter
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
        if(auth()->user()->is_routesetter() && !auth()->user()->is_organizator())
        {
            return $next($request);
        }
        return redirect(RouteServiceProvider::HOME_ORGANIZATOR);
    }

}
