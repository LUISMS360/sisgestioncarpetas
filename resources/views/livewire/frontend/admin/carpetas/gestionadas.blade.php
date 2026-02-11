<div class="card shadow-sm border-0 p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-dark mb-0">Carpetas Gestionadas</h2>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-12 col-md-6">
            <x-partials.complements.cardinfo title="Total Estudiantes" content="{{$this->estudiantes()}}">
                <i class="bi bi-people-fill text-primary fs-3"></i>
            </x-partials.complements.cardinfo>
        </div>
        <div class="col-12 col-md-6">
            <x-partials.complements.cardinfo title="Total Egresados" content="{{$this->egresados()}}">
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
        <div class="col-6 col-md-2 ms-auto">
            <label for="cicloSelect" class="form-label fw-semibold small text-muted">Ciclo</label>
            <select class="form-select border-2" wire:model.live="ciclo" id="cicloSelect">
                <option value="">Todos</option>
                <option value="I">I Ciclo</option>
                <option value="II">II Ciclo</option>
            </select>
        </div>
        <div class="col-6 col-md-2">
            <label for="anioSelect" class="form-label fw-semibold small text-muted">Año Emision</label>
            <select class="form-select border-2" wire:model.live="anio" id="anioSelect">
                <option value="">Todos</option>
                <option value="2026">2026</option>
                <option value="2025">2025</option>
                <option value="2024">2024</option>
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
        <table class="table table-hover ">
            <thead class="">
                <tr>
                    <th class="border-0" style="width: 50px;">ID</th>
                    <th class="border-0">Usuario</th>
                    <th class="border-0">DNI</th>
                    <th class="border-0">Cargo</th>
                    <th class="border-0">Resumen</th>
                    <th class="border-0">Supervisor</th>
                    <th class="border-0 text-center">Estado</th>
                    <th class="border-0 text-end">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($this->carpetas as $carpeta)
                <tr>
                    <td class="text-muted fw-bold">#{{$carpeta->id}}</td>
                    <td>
                        <div class="fw-bold text-dark text-uppercase small">{{$carpeta->datos}}</div>
                    </td>
                    <td>
                        <div class="text-muted small">{{$carpeta->dni}}</div>
                    </td>
                    <td>
                        <span class="badge bg-light-info text-info border border-info-subtle fw-normal">
                            {{$carpeta->cargo}}
                        </span>
                    </td>
                    <td>
                        <div class="text-truncate text-muted small" style="max-width: 200px;" title="{{$carpeta->resumen}}">
                            {{$carpeta->resumen}}
                        </div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <i class="bi bi-person-check-fill text-secondary me-2"></i>
                            <span class="small">{{$carpeta->supervisor}}</span>
                        </div>
                    </td>
                    <td class="text-center">
                        <span class="badge bg-light-success text-success border border-success-subtle px-3 py-2">
                            <i class="bi bi-check-circle-fill me-1"></i> {{$carpeta->estado}}
                        </span>
                    </td>
                    <td class="text-end">
                        <div class="btn-group shadow-sm" role="group">
                            <button class="btn btn-sm btn-outline-primary" title="Ver">
                                <i class="bi bi-eye "></i>
                            </button>
                            <button class="btn btn-sm btn-outline-dark" title="Generar Pdf  ">
                                <i class="bi bi-file-earmark-pdf"></i>
                            </button>
                            <button class="btn btn-sm btn-outline-danger" title="Eliminar">
                                <i class="bi bi-trash3"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center py-5">
                        <div class="text-muted">
                            <i class="bi bi-folder-x fs-1 d-block mb-3"></i>
                            <h5 class="fw-light">No hay carpetas gestionadas por el momento</h5>
                            <p class="small text-secondary">Intente ajustar los filtros de búsqueda.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if(method_exists($this->carpetas, 'links'))
    <div class="mt-4">
        {{ $this->carpetas->links() }}
    </div>
    @endif
</div>