<?php

namespace App\Http\Middleware;

use Closure;

class CheckVerifiedEmail
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
        if(!$request->user()->email_verified_at){
            return redirect()->route('verification.notice.locale');
        }
        return $next($request);
    }
}
