<x-guest-layout>
    <x-slot name="title">Verificar Correo</x-slot>

    <div class="row h-100">
        <div class="col-lg-5 col-12">
            <div id="auth-left">
                <div class="auth-logo mb-4">
                    <a href="/"><img src="{{ asset('assets/static/images/logo/logo.svg') }}" alt="Logo"></a>
                </div>
                <h1 class="auth-title" style="font-size: 2rem;">Verifica tu cuenta</h1>
                
                <p class="text-gray-600 mb-4">
                    {{ __('¡Gracias por registrarte! Antes de comenzar, ¿podrías verificar tu dirección de correo haciendo clic en el enlace que te acabamos de enviar? Si no lo recibiste, con gusto te enviaremos otro.') }}
                </p>

                @if (session('status') == 'verification-link-sent')
                    <div class="alert alert-success mt-4" role="alert">
                        <i class="bi bi-check-circle"></i> 
                        {{ __('Se ha enviado un nuevo enlace de verificación a la dirección de correo que proporcionaste durante el registro.') }}
                    </div>
                @endif

                <div class="mt-5">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg">
                            {{ __('Reenviar correo de verificación') }}
                        </button>
                    </form>

                    <div class="text-center mt-5 text-lg">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-outline-secondary btn-sm">
                                <i class="bi bi-box-arrow-left"></i> {{ __('Cerrar Sesión') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-7 d-none d-lg-block">
            <div id="auth-right">
                </div>
        </div>
    </div>
</x-guest-layout>