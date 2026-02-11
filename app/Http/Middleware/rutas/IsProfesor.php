<?php

namespace App\Http\Middleware\rutas;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsProfesor
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user()->rol !== 'profesor') {
            return redirect()->route('login');
        }

        return $next($request);
    }
}