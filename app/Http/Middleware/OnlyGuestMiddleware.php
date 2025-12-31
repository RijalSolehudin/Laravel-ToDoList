<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OnlyGuestMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->session()->has('user_email')) {
            return redirect('/')->with('message', 'You are already logged in.');
        }
        return $next($request);
    }
}
