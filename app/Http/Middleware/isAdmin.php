<?php

namespace App\Http\Middleware;

use Closure;

class isAdmin
{
    public function handle($request, Closure $next)
    {
        $admin = session('admin');

        if ($admin && $admin['role'] === 'admin') {
            return $next($request);
        }

        // Handle AJAX requests
        if ($request->ajax() || $request->wantsJson()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return redirect('/');
    }
}

