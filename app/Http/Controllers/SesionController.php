<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SesionController extends Controller
{
    public function index()
    {
        if (!auth()->check()) {
            return view('auth.login');
        }

        $rol = auth()->user()->rol;

        return match ($rol) {
            'admin'      => redirect()->route('admin.dashboard'),
            'profesor'   => redirect()->route('profesor.dashboard'),
            'estudiante' => redirect()->route('estudiante.dashboard'),
            default      => redirect('/'),
        };
    }
}
