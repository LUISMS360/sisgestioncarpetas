<div class="card shadow-sm border-0 p-4">
    <div class="d-flex align-items-center mb-4">
        <div class="bg-primary text-white rounded-3 p-2 me-3">
            <i class="bi bi-folder-plus fs-3"></i>
        </div>
        <h2 class="fw-bold text-dark mb-0">Crear Nueva Carpeta</h2>
    </div>

    <div class="row g-3 mb-5">
        <div class="col-12 col-sm-6 col-xl-3">
            <x-partials.complements.cardinfo title="Emitidas (Mes)" content="{{ $this->carpetasUltimoMes() }}">
                <i class="bi bi-calendar-check text-primary fs-4"></i>
            </x-partials.complements.cardinfo>
        </div>
        <div class="col-12 col-sm-6 col-xl-3">
            <x-partials.complements.cardinfo title="Estudiantes" content="{{ $this->carpetasEstudiantes() }}">
                <i class="bi bi-person-badge text-info fs-4"></i>
            </x-partials.complements.cardinfo>
        </div>
        <div class="col-12 col-sm-6 col-xl-3">
            <x-partials.complements.cardinfo title="Egresados" content="{{ $this->carpetasEgresados() }}">
                <i class="bi bi-mortarboard text-success fs-4"></i>
            </x-partials.complements.cardinfo>
        </div>
        <div class="col-12 col-sm-6 col-xl-3">
            <x-partials.complements.cardinfo title="Total Global" content="{{ $this->carpetasTotales() }}">
                <i class="bi bi-archive-fill text-dark fs-4"></i>
            </x-partials.complements.cardinfo>
        </div>
    </div>

    <div class=" p-4 rounded-4 mb-5 border">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h5 class="fw-bold mb-1">Localizar FUT</h5>
                <p class="text-muted small mb-3">Ingrese el DNI del solicitante para vincularlo a una nueva carpeta.</p>
                <x-partials.complements.search wire:model.live="dni" label="Búsqueda por DNI" desc="Presione enter para filtrar" />
            </div>
            <div class="col-md-4 text-center d-none d-md-block">
                <i class="bi bi-search text-primary opacity-25" style="font-size: 5rem;"></i>
            </div>
        </div>
    </div>
    <div class="row g-2 justify-content-end border-bottom pb-4 mb-3">
        <div class="col-12 col-md-2">
            <label class="form-label fw-semibold small text-secondary">Cargo</label>
            <select class="form-select border-2 shadow-sm" wire:model.live="cargo">
                <option value="">Todos</option>
                <option value="estudiante">Estudiante</option>
                <option value="egresado">Egresado</option>
                <option value="otro">Otro</option>
            </select>
        </div>
        <div class="col-12 col-md-2">
            <label class="form-label fw-semibold small text-secondary">Mes</label>
            <select class="form-select border-2 shadow-sm" wire:model.live="mes">
                <option value="">Todos</option>
                <option value="1">Enero</option>
                <option value="2">Febrero</option>
                <option value="3">Marzo</option>
                <option value="4">Abril</option>
                <option value="5">Mayo</option>
                <option value="6">Junio</option>
                <option value="7">Julio</option>
                <option value="8">Agosto</option>
                <option value="9">Setiembre</option>
                <option value="10">Ocutbre</option>
                <option value="11">Nomviembre</option>
                <option value="12">Diciembre</option>
            </select>
        </div>
        <div class="col-12 col-md-2">
            <label class="form-label fw-semibold small text-secondary">Turno</label>
            <select class="form-select border-2 shadow-sm" wire:model.live="turno">
                <option value="">Todos</option>
                <option value="mañana">Mañana</option>
                <option value="noche">Noche</option>
            </select>
        </div>
        <div class="col-12 col-md-2">
            <label class="form-label fw-semibold small text-secondary">Ciclo</label>
            <select class="form-select border-2 shadow-sm" wire:model.live="ciclo">
                <option value="">Todos</option>
                <option value="I">I</option>
                <option value="II">II</option>
                <option value="III">III</option>
                <option value="IV">IV</option>
                <option value="V">V</option>
                <option value="VI">VI</option>
            </select>
        </div>
        <div class="col-12 col-md-2">
            <label class="form-label fw-semibold small text-secondary">Añio Egreso</label>
            <select class="form-select border-2 shadow-sm" wire:model.live="anio_egreso">
                <option value="">Todos</option>
                <option value="2026">2026</option>
                <option value="2025">2025</option>
                <option value="2024">2024</option>
                <option value="2023">2023</option>
                <option value="2022">2022</option>
                <option value="2021">2021</option>
                <option value="2020">2020</option>
            </select>
        </div>
    </div>
    <div class="mb-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="fw-bold mb-0 text-secondary">FUTS Recientes</h4>
            <span class="badge bg-primary-subtle text-primary rounded-pill">Resultados: {{ $this->futs->count() }}</span>
        </div>

        <div class="table-responsive ">
            <table class="table table-hover align-middle mb-0">
                <thead class="">
                    <tr>
                        <th class="px-3">#</th>
                        <th>Solicitante</th>
                        <th>DNI / Correo</th>
                        <th>Cargo</th>
                        <th>Fundamentacion</th>
                        <th class="text-center">Estado</th>
                        <th>Fecha</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($this->futs as $fut)
                    <tr>
                        <td class="px-3 fw-bold text-muted">{{ $fut->id }}</td>
                        <td class="fw-semibold">{{ $fut->datos }}</td>
                        <td>
                            <div class="small fw-bold text-dark">{{ $fut->dni }}</div>
                            <div class="small text-muted">{{ $fut->correo }}</div>
                        </td>
                        <td><span class="badge bg-secondary-subtle text-secondary border fw-normal">{{ $fut->cargo }}</span></td>
                        <td>
                            <x-partials.complements.modal :fundamentacion="$fut->fundamentacion" />
                        </td>
                        <td class="text-center">
                            @php
                            $statusClasses = [
                            'completo' => 'bg-success-subtle text-success border-success-subtle',
                            'recibido' => 'bg-warning-subtle text-warning-emphasis border-warning-subtle',
                            'default' => 'bg-info-subtle text-info-emphasis border-info-subtle'
                            ];
                            $class = $statusClasses[$fut->estado] ?? $statusClasses['default'];
                            @endphp
                            <span class="badge border {{ $class }} rounded-pill px-3">{{ ucfirst($fut->estado) }}</span>
                        </td>
                        <td class="small text-nowrap">{{ $fut->created_at }}</td>
                        <td class="text-center">
                            <div class="btn-group shadow-sm">
                                <button class="btn btn-sm btn-primary" wire:click="agregarCarpeta('{{ $fut->id }}')" title="Crear Carpeta">
                                    <i class="bi bi-folder-plus"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger" wire:click="confimarEliminacion('{{ $fut->id }}')" title="Eliminar">
                                    <i class="bi bi-trash3"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center py-5">
                            <i class="bi bi-file-earmark-x fs-1 text-muted d-block mb-2"></i>
                            <p class="text-muted">No se han encontrado FUTs asociados a este DNI.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-3">
            {{ $this->futs->links() }}
        </div>
    </div>

    @if($this->futs->isNotEmpty())
    <div class="border-top pt-5">
        <div class="d-flex align-items-center mb-4">
            <h4 class="fw-bold mb-0">2. Designar Profesor Supervisor</h4>
            <span class="ms-3 text-muted small"><i class="bi bi-info-circle me-1"></i> Haga clic en "Añadir" para vincular al supervisor</span>
        </div>

        <div class="row g-3">
            @foreach ($this->profesores() as $profesor)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card border shadow-none h-100 hover-shadow-sm transition-all">
                    <div class="card-body d-flex align-items-center p-3">
                        <div class="avatar bg-dark text-white rounded-circle d-flex align-items-center justify-content-center me-3 shadow-sm"
                            style="width: 45px; height: 45px; min-width: 45px;">
                            <span class="fw-bold">{{ $profesor->initials }}</span>
                        </div>
                        <div class="flex-grow-1 overflow-hidden me-2">
                            <h6 class="mb-0 text-dark fw-bold text-truncate">{{ $profesor->name }}</h6>
                            <small class="text-muted d-block text-truncate">{{ $profesor->email }}</small>
                        </div>
                        <button class="btn btn-outline-success btn-sm rounded-pill px-3"
                            wire:click="designarProfesor('{{ $profesor->id }}')">
                            <i class="bi bi-person-plus-fill"></i>
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif

    <div class="modal fade" id="modalFecha" tabindex="-1" wire:ignore.self>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title fw-bold"><i class="bi bi-calendar-event me-2"></i>Fecha de Carpeta</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4 text-start">
                    <div class="form-group mb-0">
                        <label class="form-label fw-bold">Establecer Fecha de Entrega</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white"><i class="bi bi-calendar-check"></i></span>
                            <input type="date" class="form-control" wire:model.live="fecha">
                        </div>
                        <p class="form-text mt-2 small">Esta fecha quedará registrada como el plazo máximo para la gestión.</p>
                        @error('fecha')
                        <span class="text-danger"> <i class="bi bi-exclamation-triangle me-2"></i>{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer bg-light border-0">
                    <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary px-4 shadow"
                        wire:click="$dispatch('confirmarCreacion', { data: { fecha: '{{ $fecha }}' } })">
                        Confirmar y Crear Carpeta
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div>
        @script
        <script>
            // 1. Definimos las configuraciones adjuntándolas a 'window' 
            // para evitar el error de re-declaración y el SyntaxError de 'var/const'
            window.Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true
            });

            window.ElegantModal = Swal.mixin({
                customClass: {
                    popup: 'rounded-4 border-0 shadow-lg',
                    confirmButton: 'btn btn-primary px-4 rounded-pill mx-2',
                    cancelButton: 'btn btn-light px-4 rounded-pill mx-2',
                    title: 'fw-bold text-dark'
                },
                buttonsStyling: false
            });

            // 2. Usamos $wire directamente
            $wire.on('fut-no-encontrado', () => {
                window.ElegantModal.fire({
                    icon: "error",
                    title: "FUT No Encontrado",
                    text: "El número de FUT no existe en nuestros registros.",
                    footer: '<a href="#" class="text-primary fw-bold text-decoration-none">¿Registrar nuevo FUT?</a>'
                });
            });

            $wire.on('profesor-vacio', () => {
                window.Swal.fire({
                   icon: "warning",
                    title: "Seleccione un profesor",
                    text: "No ha designado a un Supervisor"
                });
            });

            $wire.on('profesor-designado', (e) => {
                let data = Array.isArray(e) ? e[0] : e;
                window.Toast.fire({
                    icon: "success",
                    title: "Designación Exitosa",
                    text: (data.name || '') + " es el nuevo supervisor"
                });
            });

            $wire.on('confirmar-eliminacion-fut', (e) => {
                let data = Array.isArray(e) ? e[0] : e;
                window.ElegantModal.fire({
                    title: "¿Eliminar el FUT?",
                    text: "Esta acción es permanente.",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Sí, eliminar",
                    cancelButtonText: "Cancelar",
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        $wire.dispatch('eliminar-fut', {
                            id: data.id
                        });
                    }
                });
            });
            $wire.on('fut-eliminado', (e) => {
                let data = Array.isArray(e) ? e[0] : e;
                window.ElegantModal.fire({
                    icon: "success",
                    title: "¡Carpeta Eliminada!",
                    text: "Se elimino la carpeta "+data.id,
                    timer: 2000,
                    showConfirmButton: false
                });
            });
            $wire.on('carpeta-creada', () => {
                let modalEl = document.getElementById('modalFecha');
                if (modalEl) {
                    let modal = bootstrap.Modal.getInstance(modalEl);
                    if (modal) modal.hide();
                }

                window.ElegantModal.fire({
                    icon: "success",
                    title: "¡Carpeta Creada!",
                    text: "La carpeta se generó correctamente.",
                    timer: 2000,
                    showConfirmButton: false
                });
            });

            window.addEventListener('abrir-modal-fecha', () => {
                let myModal = new bootstrap.Modal(document.getElementById('modalFecha'));
                myModal.show();
            });
        </script>
        @endscript
    </div>
</div>