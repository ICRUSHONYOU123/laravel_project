<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        if ($user && $user->email === 'bitthork165@gmail.com') {
            return $next($request);
        }

        return redirect('/')->with('error', 'Access denied.');
    }
}
