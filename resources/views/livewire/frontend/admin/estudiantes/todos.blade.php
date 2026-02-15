<div class="card shadow-sm border-0 rounded-3 p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h2 class="fw-bold text-dark mb-0">Gestión de Estudiantes</h2>
            <p class="text-muted small">Administre y localice los expedientes de los alumnos.</p>
        </div>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-12 col-md-4">
            <x-partials.complements.cardinfo title="Carpetas Estudiantes" content="{{$estudiantes}}">
                <i class="bi bi-person-badge-fill text-primary fs-3"></i>
            </x-partials.complements.cardinfo>
        </div>
    </div>

    <div class="p-4 rounded-4 mb-4 border">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h5 class="fw-bold mb-1"><i class="bi bi-search me-2"></i>Localizar Usuario</h5>
                <p class="text-muted small mb-3">Ingrese el DNI exacto del estudiante para filtrar los resultados.</p>
                <x-partials.complements.search wire:model.live="dni" label="Búsqueda por DNI" desc="Presione enter para filtrar" />
            </div>
            <div class="col-md-4 text-center d-none d-md-block">
                <i class="bi bi-person-vcard text-primary opacity-25" style="font-size: 4.5rem;"></i>
            </div>
        </div>
    </div>

    <div class="row g-3 align-items-end border-bottom pb-4 mb-3">
        <div class="col-12 col-md-3">
            <label for="cicloSelect" class="form-label fw-semibold small text-secondary">Ciclo Académico</label>
            <select class="form-select border-1 shadow-sm" wire:model.live="ciclo" id="cicloSelect">
                <option value="">Todos los ciclos</option>
                @foreach(['I','II','III','IV','V','VI'] as $c)
                    <option value="{{$c}}">{{$c}} Ciclo</option>
                @endforeach
            </select>
        </div>
        <div class="col-12 col-md-3">
            <label for="anioEmision" class="form-label fw-semibold small text-secondary">Año Emisión</label>
            <select class="form-select border-1 shadow-sm" wire:model.live="anio" id="anioEmision">
                <option value="">Cualquier año</option>
                @for($i = 2026; $i >= 2020; $i--)
                    <option value="{{$i}}">{{$i}}</option>
                @endfor
            </select>
        </div>
        <div class="col-12 col-md-3">
            <label for="anioEgreso" class="form-label fw-semibold small text-secondary">Año Egreso</label>
            <select class="form-select border-1 shadow-sm" wire:model.live="anio_egreso" id="anioEgreso">
                <option value="">Cualquier año</option>
                @for($i = 2026; $i >= 2020; $i--)
                    <option value="{{$i}}">{{$i}}</option>
                @endfor
            </select>
        </div>
        <div class="col-12 col-md-3">
            <label for="turnoSelect" class="form-label fw-semibold small text-secondary">Turno</label>
            <select class="form-select border-1 shadow-sm" wire:model.live="turno" id="turnoSelect">
                <option value="">Todos</option>
                <option value="mañana">Mañana</option>
                <option value="noche">Noche</option>
            </select>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="">
                <tr>
                    <th class="border-0 text-muted small text-uppercase">#</th>
                    <th class="border-0 text-muted small text-uppercase">Nombres</th>
                    <th class="border-0 text-muted small text-uppercase">DNI</th>
                    <th class="border-0 text-muted small text-uppercase">Cargo / Rol</th>
                    <th class="border-0 text-muted small text-uppercase">Correo Electrónico</th>
                    <th class="border-0 text-muted small text-uppercase text-end">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @php $estudiantesList = $this->estudiantes(); @endphp
                @forelse($estudiantesList as $estudiante)
                <tr>
                    <td><span class="text-muted fw-medium">{{$estudiante->id}}</span></td>
                    <td>
                        <div class="fw-bold text-primary text-uppercase small">{{$estudiante->name}}</div>
                    </td>
                    <td><code>{{$estudiante->dni}}</code></td>
                    <td>
                        <span class="badge bg-info-subtle text-info-emphasis rounded-pill px-3">{{$estudiante->rol}}</span>
                    </td>
                    <td class="small text-muted">{{$estudiante->correo}}</td>
                    <td class="text-end">
                        <button class="btn btn-sm btn-outline-secondary border-0"><i class="bi bi-eye"></i></button>
                        <button class="btn btn-sm btn-outline-primary border-0"><i class="bi bi-pencil-square"></i></button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-5">
                        <div class="text-muted">
                            <i class="bi bi-search fs-1 mb-3 d-block opacity-50"></i>
                            <p class="mb-0">No se encontraron estudiantes con los filtros seleccionados.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
        
        <div class="mt-4 d-flex justify-content-between align-items-center">
            <p class="text-muted small mb-0">Mostrando {{ $estudiantesList->count() }} resultados</p>
            <div>
                {{ $estudiantesList->links() }}
            </div>
        </div>
    </div>
</div>