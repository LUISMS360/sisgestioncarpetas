<div class="card shadow-sm border-0 rounded-4 overflow-hidden">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="">

                    <div class="card-header bg-white border-0 pt-4 px-4">
                        <div class="d-flex align-items-center">
                            <div class="bg-primary bg-opacity-10 p-3 rounded-3 me-3">
                                <i class="bi bi-person-plus-fill text-primary fs-3"></i>
                            </div>
                            <div>
                                <h3 class="fw-bold mb-0">Registrar Nuevo Profesor</h3>
                                <p class="text-muted small mb-0">Complete la información para dar de alta al docente en el sistema.</p>
                            </div>
                        </div>
                    </div>

                    <div class="card-body p-4">
                        <form wire:submit.prevent="create">
                            <div class="row g-4">

                                <div class="col-12">
                                    <h6 class="text-uppercase text-primary fw-bold small mb-3 border-bottom pb-2">
                                        Información General
                                    </h6>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Nombre Completo</label>
                                    <input type="text" wire:model="form.name"
                                        class="form-control border-2 @error('form.name') is-invalid @enderror"
                                        placeholder="Ej. Juan Pérez">
                                    @error('form.name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label fw-semibold">DNI</label>
                                    <input type="text" wire:model="form.dni"
                                        class="form-control border-2 @error('form.dni') is-invalid @enderror"
                                        placeholder="8 dígitos">
                                    @error('form.dni') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-md-3">
                                    <label class="form-label fw-semibold">Teléfono móvil</label>
                                    <input type="text" wire:model="form.telefono"
                                        class="form-control border-2 @error('form.telefono') is-invalid @enderror"
                                        placeholder="9XXXXXXXX">
                                    @error('form.telefono') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-12 mt-5">
                                    <h6 class="text-uppercase text-primary fw-bold small mb-3 border-bottom pb-2">
                                        Acceso al Sistema
                                    </h6>
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label fw-semibold">Correo Electrónico</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-2 border-end-0 text-muted">
                                            <i class="bi bi-envelope"></i>
                                        </span>
                                        <input type="email" wire:model="form.email"
                                            class="form-control border-2 border-start-0 @error('form.email') is-invalid @enderror"
                                            placeholder="correo@ejemplo.com">
                                        @error('form.email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label fw-semibold">Contraseña</label>
                                    <input type="password" wire:model="form.password"
                                        class="form-control border-2 @error('form.password') is-invalid @enderror"
                                        placeholder="Mínimo 8 caracteres">
                                    @error('form.password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="col-12 mt-5 border-top pt-4 text-end">
                                    <button type="submit" class="btn btn-primary px-5 shadow-sm">
                                        <i class="bi bi-check-circle-fill me-2"></i>
                                        <span wire:loading.remove>Crear</span>
                                        <span wire:loading class="spinner-border spinner-border-sm me-2"></span>
                                        <span wire:loading>Procesando...</span>
                                    </button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @script
    <script>
        Livewire.on('profesor-creado', (e) => {
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Profesor creado correctamente!",
                showConfirmButton: false,
                timer: 1500
            });
        });
    </script>
    @endscript
</div>