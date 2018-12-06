<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class VerifyAdminMiddleware
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
        if(Auth::user()->status === 'verifiedByAdmin') {
            return $next($request);
        } else {
            return response()->view('users.merchants.unverified');
        }
    }
}
