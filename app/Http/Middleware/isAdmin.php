<?php

namespace App\Http\Middleware;

use Closure;

class isAdmin
{
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->role === 'admin') {
            return $next($request);
        }

        // Handle AJAX requests
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return redirect('/');
    }
}

