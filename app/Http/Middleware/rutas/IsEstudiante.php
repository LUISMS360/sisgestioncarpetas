<?php

namespace App\Http\Middleware\rutas;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsEstudiante
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::user()->rol !== 'estudiante' && Auth::user()->rol !== 'egresado') {
            return redirect()->route('login');
        }
        return $next($request);
    }
}
