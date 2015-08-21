<?php

namespace App\Http\Middleware;
use Closure;


class JSONResponse
{
    public function handle($request, Closure $next) {
        $resp = $next($request);
        return response($resp)->header('Content-type', 'application/json');
    }
}
