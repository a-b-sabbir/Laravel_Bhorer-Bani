<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the authenticated user has an 'admin' role (assuming role_id = 1 for admin)
        if (Auth::check() && Auth::user()->role_id === 1) {
            return $next($request);
        }

        // If not an admin, redirect to the home page or a forbidden page
        return redirect()->route('welcome')->with('error', 'You are not authorized to access this page');
    }
}
