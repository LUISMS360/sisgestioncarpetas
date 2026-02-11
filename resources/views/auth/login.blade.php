<x-guest-layout title="Login">
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo mb-4">
                        <a href="/"><img src="{{ asset('assets/compiled/svg/logo.svg') }}" alt="Logo"></a>
                    </div>
                    <h1 class="auth-title">Log in.</h1>
                    <p class="auth-subtitle mb-5">Inicia sesión con los datos que ingresaste durante el registro.</p>

                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="email" 
                                   name="email" 
                                   class="form-control form-control-xl @error('email') is-invalid @enderror" 
                                   placeholder="Email" 
                                   value="{{ old('email') }}" 
                                   required autofocus>
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" 
                                   name="password" 
                                   class="form-control form-control-xl @error('password') is-invalid @enderror" 
                                   placeholder="Contraseña" 
                                   required autocomplete="current-password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-check form-check-lg d-flex align-items-end">
                            <input class="form-check-input me-2" type="checkbox" name="remember" id="remember_me">
                            <label class="form-check-label text-gray-600" for="remember_me">
                                Mantener sesión iniciada
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
                    </form>

                    <div class="text-center mt-5 text-lg fs-4">
                        @if (Route::has('register'))
                            <p class="text-gray-600">¿No tienes una cuenta? <a href="{{ route('register') }}" class="font-bold">Sign up</a>.</p>
                        @endif
                        
                        @if (Route::has('password.request'))
                            <p><a class="font-bold" href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>.</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">
                    </div>
            </div>
        </div>
    </div>
</x-guest-layout>