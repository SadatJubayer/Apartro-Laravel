<?php

namespace App\Http\Middleware;

use Closure;

class AuthTenant
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
        if ($request->session()->has('username') && $request->session()->get('role') == 'tenant') {
            return $next($request);
        } else {
            return redirect('/login')->withErrors('Not authorized! Please Login.');
        }
    }
}
