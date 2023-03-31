<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->user() && $request->user()->role != 0) {
            abort(403, 'Acción no autorizada.');
        }

        return $next($request);
    }
}