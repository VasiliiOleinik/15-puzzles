<?php

namespace App\Http\Middleware;

use Closure;

class DebugbarDisable
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
        app('debugbar')->disable();
        return $next($request);
    }
}
