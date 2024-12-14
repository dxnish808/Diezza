<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  callable(Request):RedirectResponse|Response  $next
     * @param  string  $role
     * @return RedirectResponse|Response
     */
    public function handle(Request $request, callable $next, $role): RedirectResponse|Response
    {
        if ($request->user()->role !== $role) {
            
            return redirect()->route('unauthorized'); 
        }
        return $next($request);
    }
}

