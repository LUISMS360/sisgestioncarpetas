<x-guest-layout>
    <x-slot name="title">Recuperar Contraseña</x-slot>

    <div class="row h-100">
        <div class="col-lg-5 col-12">
            <div id="auth-left">
                <div class="auth-logo mb-4">
                    <a href="/"><img src="{{ asset('assets/static/images/logo/logo.svg') }}" alt="Logo"></a>
                </div>
                <h1 class="auth-title">¿Olvidaste tu contraseña?</h1>
                <p class="auth-subtitle mb-5">
                    No hay problema. Solo dinos tu dirección de correo electrónico y te enviaremos un enlace para restablecerla.
                </p>

                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="email" 
                               name="email" 
                               id="email" 
                               value="{{ old('email') }}" 
                               class="form-control form-control-xl @error('email') is-invalid @enderror" 
                               placeholder="Correo electrónico" 
                               required autofocus>
                        <div class="form-control-icon">
                            <i class="bi bi-envelope"></i>
                        </div>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">
                        Enviar enlace de recuperación
                    </button>
                </form>

                <div class="text-center mt-5 text-lg fs-4">
                    <p class='text-gray-600'>¿Recordaste tu cuenta? 
                        <a href="{{ route('login') }}" class="font-bold">Inicia sesión</a>.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-lg-7 d-none d-lg-block">
            <div id="auth-right">
                </div>
        </div>
    </div>
</x-guest-layout>