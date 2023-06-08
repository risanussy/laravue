<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CorsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $res = $next($request);

        $res->headers->set('Access-Control-Request-Origin', '*');
        $res->headers->set('Access-Control-Request-Method', 'GET, PUT, DELETE, POST');
        $res->headers->set('Access-Control-Request-Header', 'Content-Type, Authorization');

        return $res;
    }
}
