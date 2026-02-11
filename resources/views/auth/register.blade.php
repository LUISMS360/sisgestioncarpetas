<x-guest-layout title='Registro'>
    <div class="row h-100">
        <div class="col-lg-5 col-12">
            <div id="auth-left">
                <div class="auth-logo mb-4">
                    <a href="/"><img src="{{ asset('assets/static/images/logo/logo.svg') }}" alt="Logo"></a>
                </div>
                <h1 class="auth-title">Sign Up</h1>
                <p class="auth-subtitle mb-5">Ingresa tus datos para registrarte en nuestra plataforma.</p>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="text" name="name" value="{{ old('name') }}" 
                               class="form-control form-control-xl @error('name') is-invalid @enderror" 
                               placeholder="Nombre Completo" required autofocus autocomplete="name">
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="email" name="email" value="{{ old('email') }}" 
                               class="form-control form-control-xl @error('email') is-invalid @enderror" 
                               placeholder="Correo Electrónico" required autocomplete="username">
                        <div class="form-control-icon">
                            <i class="bi bi-envelope"></i>
                        </div>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group position-relative has-icon-left mb-4">
                        <div class="mb-3">
                            <select
                                class="form-select form-select-lg"
                                name="rol"
                            >
                                <option value>Selecione Rol</option>
                                <option value="estudiante">Estudiante</option>
                                <option value="egresado">Egresado</option>
                            </select>
                        </div>                        
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>
                        @error('rol')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="text" name="dni" value="{{ old('dni') }}" 
                               class="form-control form-control-xl @error('dni') is-invalid @enderror" 
                               placeholder="Ingrese su numero de DNI" required autofocus autocomplete="dni">
                        <div class="form-control-icon">
                            <i class="bi bi-file-binary"></i>
                        </div>
                        @error('dni')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="text" name="telefono" value="{{ old('telefono') }}" 
                               class="form-control form-control-xl @error('telefono') is-invalid @enderror" 
                               placeholder="Ingrese su numero de telefono" required autofocus autocomplete="telefono">
                        <div class="form-control-icon">
                            <i class="bi bi-telephone"></i>
                        </div>
                        @error('telefono')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="password" name="password" 
                               class="form-control form-control-xl @error('password') is-invalid @enderror" 
                               placeholder="Contraseña" required autocomplete="new-password">
                        <div class="form-control-icon">
                            <i class="bi bi-shield-lock"></i>
                        </div>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group position-relative has-icon-left mb-4">
                        <input type="password" name="password_confirmation" 
                               class="form-control form-control-xl @error('password_confirmation') is-invalid @enderror" 
                               placeholder="Confirmar Contraseña" required autocomplete="new-password">
                        <div class="form-control-icon">
                            <i class="bi bi-shield-check"></i>
                        </div>
                        @error('password_confirmation')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Registrarse</button>
                </form>

                <div class="text-center mt-5 text-lg fs-4">
                    <p class='text-gray-600'>¿Ya tienes una cuenta? 
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