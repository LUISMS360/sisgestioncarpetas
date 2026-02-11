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
                        <th>Resumen</th>
                        <th>Solicitante</th>
                        <th>DNI / Correo</th>
                        <th>Cargo</th>
                        <th class="text-center">Estado</th>
                        <th>Fecha</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($this->futs as $fut)
                    <tr>
                        <td class="px-3 fw-bold text-muted">{{ $fut->id }}</td>
                        <td>
                            <div class="text-truncate" style="max-width: 200px;" title="{{ $fut->resumen }}">
                                {{ $fut->resumen }}
                            </div>
                        </td>
                        <td class="fw-semibold">{{ $fut->datos }}</td>
                        <td>
                            <div class="small fw-bold text-dark">{{ $fut->dni }}</div>
                            <div class="small text-muted">{{ $fut->correo }}</div>
                        </td>
                        <td><span class="badge bg-secondary-subtle text-secondary border fw-normal">{{ $fut->cargo }}</span></td>
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
                        <td class="small text-nowrap">{{ $fut->fecha }}</td>
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
            Livewire.on('fut-no-encontrado', (e) => {
                Swal.fire({
                    icon: "error",
                    title: "Fut No Encontrado",
                    text: "El fut no se encuentra, registrelo ahora",
                    footer: '<a href="#">registrar Fut?</a>'
                });
            });
            Livewire.on('profesor-vacio', (e) => {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "No ha desiganado a un profesor Supervisor!",
                });
            });
            Livewire.on('fut-revisado', (e) => {
                Swal.fire({
                    icon: "warning",
                    title: "Fut Revisado",
                    text: "El fut selecionado ya ha sido revisado",
                });
            });
            Livewire.on('profesor-no-encontrado', (e) => {
                Swal.fire({
                    icon: "question",
                    title: "El profesor no existe",
                    text: "Selecione de la lista de profesores",
                });
            });
            Livewire.on('profesor-designado', (e) => {
                Swal.fire({
                    icon: "success",
                    title: "Profesor Desiganado!",
                    text: e.name + " Supervisor de la carpeta",
                    draggable: true
                });
            });
            Livewire.on('confirmar-eliminacion-fut', (e) => {
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: "btn btn-success",
                        cancelButton: "btn btn-danger me-2"
                    },
                    buttonsStyling: false
                });
                swalWithBootstrapButtons.fire({
                    title: "Desea eliminar el FUT?",
                    text: "No se podra revertir la accion!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Si, deseo eliminar!",
                    cancelButtonText: "No, cancelar!",
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.dispatch('eliminar-fut', e.id);
                    } else if (
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire({
                            title: "Cancelado",
                            text: "La accion se ha cancelado",
                            icon: "error"
                        });
                    }
                });
            });
            Livewire.on('fut-eliminado', (e) => {
                Swal.fire({
                    title: "Fut " + e.id + " Eliminado Correctamente!",
                    icon: "success",
                    draggable: true
                });
            });
            // Escuchar el evento para abrir el modal
            window.addEventListener('abrir-modal-fecha', event => {
                var myModal = new bootstrap.Modal(document.getElementById('modalFecha'));
                myModal.show();
            });

            // Cerrar el modal cuando la carpeta se cree
            window.addEventListener('carpeta-creada', event => {
                bootstrap.Modal.getInstance(document.getElementById('modalFecha')).hide();
                Swal.fire({
                    icon: "success",
                    title: "Carpeta Creada!",
                    text: "La carpeta se ha creado de manera exitosa!",
                    draggable: true
                });
            });
        </script>
        @endscript
    </div>
</div>