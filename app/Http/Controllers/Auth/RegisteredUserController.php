<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'rol' => ['required', 'in:estudiante,profesor,egresado,admin', 'string'],
            'telefono' => ['required', 'starts_with:9', 'digits:9', 'unique:users,telefono'],
            'dni' => ['required', 'digits:8', 'string', 'unique:users,dni'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'rol' => $request->rol,
            'telefono' => $request->telefono,
            'dni' => $request->dni,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);
        return match ($user->rol) {
            'estudiante', 'egresado' => redirect()->route('estudiante.dashboard'),
            'profesor'               => redirect()->route('profesor.dashboard'),
            'admin'                  => redirect()->route('admin.dashboard'),
            default                  => redirect('/'), // Ruta por defecto si el rol falla
        };
    }
}
