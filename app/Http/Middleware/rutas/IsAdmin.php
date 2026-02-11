<?php
namespace App\Http\Middleware\rutas;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        // Verifica si el usuario está logueado Y si tiene el rol correcto
        if (Auth::check() && Auth::user()->rol === 'admin') {
            return $next($request);
        }

          return redirect()->route('login');
    }
}