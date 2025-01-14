<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class User
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user() && auth()->user()->role_id == 2) {
            return $next($request);
        }

        abort(404);
    }
}
