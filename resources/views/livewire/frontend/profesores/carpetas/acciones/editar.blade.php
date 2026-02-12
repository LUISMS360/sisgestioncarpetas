<div>
    <div class="card p-3">
        <h1 class="mb-4">EDITAR CARPETA {{$id}}</h1>
        <div class="mt-2">
            <strong>Fecha de Emision {{$creacion}}</strong>
        </div>
        <div class="row mt-3 mb-2 d-flex justify-content-end">
            <div class="col-12 col-sm-3">
                <x-partials.inputs.fut.input label="Modulo" :disabled="!$isEditable"  wire:model="modulo" />
            </div>
        </div>
        <h4 class="mb-5 mt-2">Estudiante / Egresado</h4>
        <div class="row">
            <div class="col-12 col-sm-6">
                <x-partials.inputs.fut.input label="Estudiante" disabled wire:model="estudiante" />
            </div>
            <div class="col-sm-3">
                <x-partials.inputs.fut.input label="Cargo" disabled wire:model="cargo" />
            </div>
            <div class="col-sm-3">
                <x-partials.inputs.fut.input label="Carrera" disabled wire:model="carrera" />
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-sm-3">
                <x-partials.inputs.fut.input label="Documento" disabled  wire:model="documento"/>
            </div>
            <div class="col-sm-3">
                <x-partials.inputs.fut.input label="Telefono" disabled wire:model="telefono" />
            </div>
            <div class="col-sm-3">
                <x-partials.inputs.fut.input label="Correo" disabled wire:model="correo" />
            </div>
            <div class="col-sm-3">
                @if ($this->cargo == 'estudiante')
                <x-partials.inputs.fut.input label="Turno" disabled wire:model="turno" />
                <x-partials.inputs.fut.input label="Ciclo" disabled wire:model="ciclo" />
                @elseif($this->cargo == 'egresado')
                <x-partials.inputs.fut.input label="Egreso" disabled wire:model="anio_egreso" />
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-6 mt-4">
                <div class="mb-2">
                    <label for="" class="form-label mb-3 fw-bold">Resumen de Solicitud</label>
                    <input type="text" class="form-control" disabled wire:model="resumen" />
                </div>
                <x-partials.inputs.fut.text-area label="Documentos adjuntados" rows="4" disabled wire:model="documentos_adjuntos" />
            </div>
            <div class="col-12 col-lg-6 mt-4">
                <x-partials.inputs.fut.text-area label="Fundamentacion del Pedido" disabled wire:model="fundamentacion_pedido" />
            </div>
        </div>
        <div class="container-fluid mt-2">
            <h5>Actualizar Hojas de Carpeta</h5>
        </div>
        <div class="row d-flex justify-content-center mt-3">
            <div class="col-12 col-sm-2">
                <label class="form-check-label" for=""> Hoja Aceptacion</label>
                @if($this->hj_aceptacion_prtc_preprofesional>0)
                <div class="form-check">
                    <input type="checkbox" checked wire:model="hj_aceptacion_prtc_preprofesional" {{ $isEditable ? '' : 'disabled' }} class="form-check-input">
                </div>
                @else
                <div class="form-check">
                    <input type="checkbox" wire:model="hj_aceptacion_prtc_preprofesional" {{ $isEditable ? '' : 'disabled' }} class="form-check-input">
                </div>
                @endif
            </div>
            <div class="col-12 col-sm-2">
                <label class="form-check-label" for=""> Hoja Monitoreo</label>
                @if($this->hj_monitoreo_prtc_preprofesional>0)
                <div class="form-check">
                    <input class="form-check-input" checked type="checkbox" wire:model="hj_monitoreo_prtc_preprofesional" {{ $isEditable ? '' : 'disabled' }} id="" />
                </div>
                @else
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" wire:model="hj_monitoreo_prtc_preprofesional" {{ $isEditable ? '' : 'disabled' }} id="" />
                </div>
                @endif
            </div>
            <div class="col-12 col-sm-2">
                <label class="form-check-label" for=""> Hoja Evaluacion</label>
                @if($this->hj_evaluacion_prtc_preprofesional>0)
                <div class="form-check">
                    <input class="form-check-input" checked type="checkbox" wire:model="hj_evaluacion_prtc_preprofesional" {{ $isEditable ? '' : 'disabled' }} id="" />
                </div>
                @else
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" wire:model="hj_evaluacion_prtc_preprofesional" {{ $isEditable ? '' : 'disabled' }} id="" />
                </div>
                @endif
            </div>
            <div class="col-12 col-sm-2">
                <label class="form-check-label" for=""> Hoja Informe</label>
                @if($this->hj_informe_prtc_preprofesional>0)
                <div class="form-check">
                    <input class="form-check-input" checked type="checkbox" wire:model="hj_informe_prtc_preprofesional" {{ $isEditable ? '' : 'disabled' }} id="" />
                </div>
                @else
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" wire:model="hj_informe_prtc_preprofesional" {{ $isEditable ? '' : 'disabled' }} id="" />
                </div>
                @endif
            </div>
            <div class="col-12 col-sm-2">
                <label class="form-check-label" for=""> Hoja Resumen</label>
                @if($this->hj_resumen_prtc_preprofesional>0)
                <div class="form-check">
                    <input class="form-check-input" checked type="checkbox" wire:model="hj_resumen_prtc_preprofesional" {{ $isEditable ? '' : 'disabled' }} id="" />
                </div>
                @else
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" wire:model="hj_resumen_prtc_preprofesional" {{ $isEditable ? '' : 'disabled' }} id="" />
                </div>
                @endif
            </div>
        </div>
        <div class="container-fluid mt-5">
             <h5>Periodo de practicas</h5>
        </div>        
        <div class="row mt-3">
            <div class="col-12 col-sm-6">
                <x-partials.inputs.fut.input label="Fecha Inicio" :disabled="!$isEditable" wire:model="fecha_inicio" />
            </div>
            <div class="col-12 col-sm-6">
                <x-partials.inputs.fut.input label="Fecha Fin" :disabled="!$isEditable" wire:model="fecha_fin" />
            </div>
        </div>
        <div class="container-fluid mt-5">
             <h5>Calificacion Final</h5>
        </div>        
        <div class="row mt-4 justify-content-center">
            <div class="col-12 col-sm-3 mt-4">
                <x-partials.inputs.fut.input label="Nota" :disabled="!$isEditable" wire:model="nota" />
            </div>
            <div class="col-12 col-sm-3 mt-4">
                <x-partials.inputs.fut.input label="NotaL" :disabled="!$isEditable" wire:model="nota_letra" />
            </div>
            <div class="col-12 col-sm-5 mt-4">
                <x-partials.inputs.fut.input label="Lugar" :disabled="!$isEditable" wire:model="lugar" />
            </div>
        </div>
        <div class="row mt-3">
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
                        class="btn btn-info mx-2 btn-sm"
                        wire:click="actualizarHojas"
                        {{ !$isEditable ? 'disabled' : '' }}>
                        <i class="bi bi-check2-square me-2"></i>Actualizar
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
        Livewire.on('hojas-actualizada', (e) => {
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Hojas Actualizadas!",
                showConfirmButton: false,
                timer: 1500
            });
        });
        Livewire.on('carpeta-completa', (e) => {
            Swal.fire({
                title: "Carpeta Revisada!",
                icon: "success",
                draggable: true
            });
        });
    </script>
    @endscript
</div>