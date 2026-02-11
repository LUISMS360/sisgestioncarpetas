<div class="card shadow-sm border-0 p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-dark mb-0">Carpetas Pendientes</h2>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-12 col-md-6">
            <x-partials.complements.cardinfo title="Carpetas Estudiantes" content="{{$this->estudiantes()}}">
                <i class="bi bi-person-badge-fill text-primary fs-3"></i>
            </x-partials.complements.cardinfo>
        </div>
        <div class="col-12 col-md-6">
            <x-partials.complements.cardinfo title="Carpetas Egresados" content="{{$this->egresados()}}">
                <i class="bi bi-mortarboard-fill text-success fs-3"></i>
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
    <div class="row g-3 align-items-end border-bottom pb-4 mb-3">
        <div class="col-12 col-md-2 ms-auto">
            <label for="cicloSelect" class="form-label fw-semibold small">Ciclo</label>
            <select class="form-select border-2" wire:model.live="ciclo" id="cicloSelect">
                <option value="">Todos</option>
                <option value="I">I Ciclo</option>
                <option value="II">II Ciclo</option>
                <option value="III">III Ciclo</option>
                <option value="IV">IV Ciclo</option>
                <option value="V">V Ciclo</option>
                <option value="VI">VI Ciclo</option>
            </select>
        </div>
        <div class="col-12 col-md-2">
            <label for="anioSelect" class="form-label fw-semibold small">Año Emision</label>
            <select class="form-select border-2" wire:model.live="anio" id="anioSelect">
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
        <div class="col-12 col-md-2">
            <label for="anioSelect" class="form-label fw-semibold small">Año Egreso</label>
            <select class="form-select border-2" wire:model.live="anio_egreso" id="anioSelect">
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
        <div class="col-12 col-md-2">
            <label for="anioSelect" class="form-label fw-semibold small">Turno</label>
            <select class="form-select border-2" wire:model.live="turno" id="anioSelect">
                <option value="">Todos</option>
                <option value="mañana">Mañana</option>
                <option value="noche">Noche</option>
            </select>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-hover mt-3">
            <thead class="">
                <tr>
                    <th class="border-0">#</th>
                    <th class="border-0">Usuario</th>
                    <th class="border-0">DNI</th>
                    <th class="border-0">Cargo</th>
                    <th class="border-0">Correo</th>
                    <th class="border-0 text-center">Resumen</th>
                    <th class="border-0">Supervisor</th>
                    <th class="border-0 text-center">Estado</th>
                    <th class="border-0" style="min-width: 150px;">Progreso</th>
                    <th class="border-0 text-end">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($this->carpetas() as $carpeta)
                <tr>
                    <td>
                        <div class="small fw-bold">{{$carpeta->id}}</div>
                    </td>
                    <td>
                        <div class="fw-bold text-dark text-uppercase small">{{$carpeta->datos}}</div>
                    </td>
                    <td>
                        <div class="small">{{$carpeta->dni}}</div>
                    </td>
                    <td>
                        <span class="small">{{$carpeta->cargo}}</span>
                    </td>
                    <td class="small text-muted">{{$carpeta->correo}}</td>
                    <td class="text-center">
                        <button type="button" class="btn btn-sm btn-outline-primary px-3"
                            data-bs-toggle="modal" data-bs-target="#modalResumen{{$carpeta->id}}">
                            <i class="bi bi-eye-fill me-1"></i> Ver
                        </button>

                        <div class="modal fade" id="modalResumen{{$carpeta->id}}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content border-0 shadow">
                                    <div class="modal-header bg-primary text-white">
                                        <h5 class="modal-title">Resumen de Carpeta #{{$carpeta->id}}</h5>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body p-4 text-start">
                                        <p class="text-muted mb-1 small fw-bold text-uppercase">Contenido de la solicitud:</p>
                                        <div class="p-3 bg-light rounded border text-dark">
                                            {{$carpeta->resumen}}
                                        </div>
                                    </div>
                                    <div class="modal-footer border-0">
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <button type="button" class="btn btn-sm btn-light border d-flex align-items-center"
                            data-bs-toggle="modal" data-bs-target="#modalMensajeProfesor"
                            wire:click="prepararMensaje('{{ $carpeta->profesor_id }}','{{ $carpeta->id }}')">
                            <i class="bi bi-envelope-fill text-primary me-2"></i>
                            <span class="text-truncate" style="max-width: 120px;">{{ $carpeta->supervisor }}</span>
                        </button>
                    </td>
                    <td class="text-center">
                        <span class="badge bg-light-warning text-warning-emphasis border border-warning-subtle px-3 py-2">
                            <i class="bi bi-clock-history me-1"></i> {{$carpeta->estado}}
                        </span>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="progress flex-grow-1" style="height: 8px;" role="progressbar">
                                <div class="progress-bar bg-success rounded" style="width: {{ $carpeta->progreso }}%"></div>
                            </div>
                            <span class="ms-2 small fw-bold text-muted">{{ $carpeta->progreso }}%</span>
                        </div>
                    </td>
                    <td class="text-end">
                        <div class="btn-group">
                            <a href="{{ route('admin.editar-carpeta',['id'=>$carpeta->id]) }}" wire:navigate
                                class="btn btn-sm btn-info text-white" title="Editar">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <button class="btn btn-sm btn-danger"
                                wire:click="deleteCarpeta('{{ $carpeta->id }}')"
                                title="Eliminar">
                                <i class="bi bi-trash3"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="10" class="text-center py-5 text-muted">
                        <i class="bi bi-search fs-1 mb-2 mx-2"></i>
                        No se encontraron carpetas pendientes con los filtros seleccionados. <i class="bi bi-emoji-frown mx-2 fs-3"></i>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $this->carpetas()->links() }}
    </div>

    <div wire:ignore.self class="modal fade" id="modalMensajeProfesor" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold">Enviar mensaje a: <span class="text-primary">{{ $profesor_nombre }}</span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form wire:submit.prevent="enviarMensaje">
                    <div class="modal-body p-4">
                        <div class="mb-3 text-start">
                            <label class="form-label fw-bold small">Asunto</label>
                            <input type="text" class="form-control" wire:model="asunto" placeholder="Ej: Observaciones en la carpeta">
                            @error('asunto') <small class="text-danger d-block mt-1">{{ $message }}</small> @enderror
                        </div>
                        <div class="mb-3 text-start">
                            <label class="form-label fw-bold small">Mensaje</label>
                            <textarea class="form-control" wire:model="mensaje" rows="4" placeholder="Escriba su mensaje aquí..."></textarea>
                            @error('mensaje') <small class="text-danger d-block mt-1">{{ $message }}</small> @enderror
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary px-4">
                            <i class="bi bi-send-fill me-2"></i>Enviar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div>
        @script
        <script>
            window.addEventListener('closeModal', event => {
                // 1. Intentamos cerrar el modal (opcional, ya que vamos a redirigir)
                const modalEl = document.getElementById('modalMensajeProfesor');
                const modal = bootstrap.Modal.getInstance(modalEl);
                if (modal) modal.hide();

                // 2. Lanzamos la alerta
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "Mensaje enviado Correctamente",
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true // Añadimos una barra para que el usuario vea el tiempo
                }).then(() => {
                    // 3. Redirección al terminar el tiempo de la alerta
                    window.location.href = "{{ route('admin.carpetas.pendientes') }}";
                });
            });
            Livewire.on('confirm-delete-carpeta', (e) => {
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: "btn btn-success",
                        cancelButton: "btn btn-danger me-2"
                    },
                    buttonsStyling: false
                });
                swalWithBootstrapButtons.fire({
                    title: "Desea eliminar la carpeta" + e.id + " ?",
                    text: "No se podra revertir esta accion!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Si, quiero eliminar!",
                    cancelButtonText: "No, cancelar!",
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.dispatch('delete-carpeta', {
                            id: e.id
                        });
                    } else if (
                        /* Read more about handling dismissals below */
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire({
                            title: "Cancelado",
                            text: "Accion cancelada",
                            icon: "error"
                        });
                    }
                });
            });
            Livewire.on('carpeta-eliminada', (e) => {
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "La carpeta " + e.id + " ha sido elimianda!",
                    showConfirmButton: false,
                    timer: 1500
                });
            });
        </script>
        @endscript
    </div>
</div>