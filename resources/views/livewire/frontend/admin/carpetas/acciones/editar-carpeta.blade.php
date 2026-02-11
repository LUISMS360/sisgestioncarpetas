<div>
    <div class="card p-3">
        <h1 class="mb-4">EDITAR CARPETA {{$id}}</h1>
        <div class="mt-2">
            <strong>Fecha de Emision {{$creacion}}</strong>
        </div>
        <h4 class="mb-5 mt-2">Estudiante / Egresado</h4>
        <div class="row">
            <div class="col-12 col-sm-6">
                <x-partials.inputs.fut.input label="Estudiante" :disabled="!$isEditable" disabled wire:model="estudiante" />
            </div>
            <div class="col-sm-3">
                <x-partials.inputs.fut.input label="Cargo" :disabled="!$isEditable" wire:model="cargo" />
            </div>
            <div class="col-sm-3">
                <x-partials.inputs.fut.input label="Carrera" :disabled="!$isEditable" wire:model="carrera" />
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-sm-3">
                <x-partials.inputs.fut.input label="Documento" wire:model="documento" :disabled="!$isEditable" />
            </div>
            <div class="col-sm-3">
                <x-partials.inputs.fut.input label="Telefono" :disabled="!$isEditable" wire:model="telefono" />
            </div>
            <div class="col-sm-3">
                <x-partials.inputs.fut.input label="Correo" :disabled="!$isEditable" wire:model="correo" />
            </div>
            <div class="col-sm-3">
                @if ($this->cargo == 'estudiante')
                <x-partials.inputs.fut.input label="Turno" :disabled="!$isEditable" wire:model="turno" />
                <x-partials.inputs.fut.input label="Ciclo" :disabled="!$isEditable" wire:model="ciclo" />
                @elseif($this->cargo == 'egresado')
                <x-partials.inputs.fut.input label="Egreso" :disabled="!$isEditable" wire:model="anio_egreso" />
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-6 mt-4">
                <div class="mb-2">
                    <label for="" class="form-label mb-3 fw-bold">Resumen de Solicitud</label>
                    <input type="text" class="form-control" name="" {{ $isEditable ? '' : 'disabled' }} wire:model="resumen" />
                </div>
                <x-partials.inputs.fut.text-area label="Documentos adjuntados" rows="4" :disabled="!$isEditable" wire:model="documentos_adjuntos" />
            </div>
            <div class="col-12 col-lg-6 mt-4">
                <x-partials.inputs.fut.text-area label="Fundamentacion del Pedido" :disabled="!$isEditable" wire:model="fundamentacion_pedido" />
            </div>
        </div>
        <h4 class="mb-2 mt-2">Profesor (Supervisor)</h4>
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="rounded shadow-sm p-4">
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <div class="d-flex align-items-center p-2">
                                <div class="avatar bg-primary text-white rounded-circle d-flex align-items-center justify-content-center flex-shrink-0"
                                    style="width: 50px; height: 50px; font-weight: bold;">
                                    {{ $profesor->initials }}
                                </div>

                                <div class="ms-3 overflow-hidden">
                                    <h6 class="mb-0 text-truncate fw-bold">{{ $profesor->name }}</h6>
                                    <small class="text-muted d-block text-truncate">{{ $profesor->email }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="container d-flex flex-wrap gap-5 gap-md-4 justify-content-start">
                            @if($this->carpeta->hj_aceptacion_prtc_preprofesional)
                            <span class="badge bg-light-success rounded-fill fs-6"><i class="bi bi-check-circle me-2"></i>HJ Aceptacion</span>
                            @else
                            <span class="badge bg-light-warning rounded-fill fs-6"><i class="bi bi-check-circle me-2"></i>HJ Acpetacion</span>
                            @endif
                            @if($this->carpeta->hj_monitoreo_prtc_preprofesional)
                            <span class="badge bg-light-success rounded-fill fs-6"><i class="bi bi-check-circle me-2"></i>HJ Monitoreo</span>
                            @else
                            <span class="badge bg-light-warning rounded-fill fs-6"><i class="bi bi-check-circle me-2"></i>HJ Monitoreo</span>
                            @endif
                            @if($this->carpeta->hj_evaluacion_prtc_preprofesional)
                            <span class="badge bg-light-success rounded-fill fs-6"><i class="bi bi-check-circle me-2"></i>HJ Evaluacion</span>
                            @else
                            <span class="badge bg-light-warning rounded-fill fs-6"><i class="bi bi-check-circle me-2"></i>HJ Evaluacion</span>
                            @endif
                            @if($this->carpeta->hj_informe_prtc_preprofesional)
                            <span class="badge bg-light-success rounded-fill fs-6"><i class="bi bi-check-circle me-2"></i>HJ Informe</span>
                            @else
                            <span class="badge bg-light-warning rounded-fill fs-6"><i class="bi bi-check-circle me-2"></i>HJ Informe</span>
                            @endif
                            @if($this->carpeta->hj_resumen_prtc_preprofesional)
                            <span class="badge bg-light-success rounded-fill fs-6"><i class="bi bi-check-circle me-2"></i>HJ Resumen</span>
                            @else
                            <span class="badge bg-light-warning rounded-fill fs-6"><i class="bi bi-check-circle me-2"></i>HJ Resumen</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12 col-sm-4">
                <label for="" class="fw-bold">Progreso</label>
                <div class="progress mt-2" style="height: auto;">
                    <div class="progress-bar text-bg-success py-2 fw-bold fs-5"
                        role="progressbar"
                        style="width: {{ $progreso }}%"
                        aria-valuenow="{{ $progreso }}"
                        aria-valuemin="0"
                        aria-valuemax="100">
                        {{ $progreso }} %
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="mb-3">
                    <label for="fecha_emision" class="form-label fw-bold mt-2">
                        <i class="bi bi-calendar-event me-1"></i> Fecha de Entrega
                    </label>

                    <div class="input-group has-validation">
                        <span class="input-group-text bg-white border-end-0">
                            <i class="bi bi-calendar-check text-primary"></i>
                        </span>

                        <input
                            type="date"
                            id="fecha_emision"
                            class="form-control border-start-0 @error('fecha') is-invalid @enderror"
                            wire:model="fecha"
                            {{ $isEditable ? '' : 'disabled' }}>

                        @error('fecha')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-4">
                <div class="mt-5 d-flex justify-content-end">
                    <button type="button"
                        wire:click="toggleEdit"
                        class="btn me-3 {{ $isEditable ? 'btn-danger' : 'btn-outline-info' }}">
                        <i class="bi {{ $isEditable ? 'bi-x-circle' : 'bi-pen' }} me-2 btn-sm"></i>
                        {{ $isEditable ? 'Cancelar' : 'Editar' }}
                    </button>

                    <button type="submit"
                        class="btn btn-primary btn-sm"
                        wire:click="updateFecha"
                        {{ !$isEditable ? 'disabled' : '' }}>
                        <i class="bi bi-bookmark-check-fill me-2"></i>Actualizar
                    </button>
                    <button type="submit"
                        class="btn btn-success mx-2 btn-sm"
                        wire:click="marcaCompleto"
                        {{ !$isEditable ? 'disabled' : '' }}>
                        <i class="bi bi-check2-circle me-2"></i>Completo
                    </button>
                </div>
            </div>
        </div>
    </div>
    @script
    <script>
        Livewire.on('fecha-actualizada', (e) => {
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Fecha de supervision actualizada!",
                showConfirmButton: false,
                timer: 1500
            });
        });
    </script>
    @endscript
</div>