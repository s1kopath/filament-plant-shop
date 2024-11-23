<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated and has the is_admin flag
        if (Auth::check() && Auth::user()->is_admin) {
            return $next($request);
        }

        Auth::logout();
        // Redirect or abort if the user is not an admin
        return abort(403, 'Access denied');
    }
}
