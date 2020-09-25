<?php

namespace App\Http\Middleware;

use Closure;

class validateUser
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
        error_log($request->id);
        if ($request->session()->get('id') == $request->id) {
            return $next($request);
        }
    }
}
