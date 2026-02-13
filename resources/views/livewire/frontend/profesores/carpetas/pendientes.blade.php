<div class="card shadow-sm border-0 p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-dark mb-0">Carpetas Pendientes</h2>
    </div>
    <div class="row g-3 mb-4">
        <div class="col-12 col-md-4">
            <x-partials.complements.cardinfo title="Carpetas Totales" content="{{$carpetas}}">
                <i class="bi bi-archive fs-3"></i>
            </x-partials.complements.cardinfo>
        </div>
        <div class="col-12 col-md-4">
            <x-partials.complements.cardinfo title="Carpetas Egresados" content="{{$egresados}}">
                <i class="bi bi-person-badge-fill text-primary fs-3"></i>
            </x-partials.complements.cardinfo>
        </div>
        <div class="col-12 col-md-4">
            <x-partials.complements.cardinfo title="Carpetas Egresados" content="{{$estudiantes}}">
                <i class="bi bi-mortarboard-fill text-success fs-3"></i>
            </x-partials.complements.cardinfo>
        </div>
    </div>
    <div class=" p-4 rounded-4 mb-5 border">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h5 class="fw-bold mb-1">Buscar Carpeta</h5>
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
            <label for="cicloSelect" class="form-label fw-semibold small">Cargo</label>
            <select class="form-select border-2" wire:model.live="cargo" id="cicloSelect">
                <option value="">Todos</option>
                <option value="egresado">Egresado</option>
                <option value="estudiante">Estudiante</option>
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
    </div>
    <div class="">
        <div
            class="table-responsive">
            <table
                class="table mt-5">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Dni</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Resumen</th>
                        <th scope="col">Cargo</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($this->carpetas() as $carpeta)
                    <tr>
                        <td class="small fw-bold">{{$carpeta->id}}</td>
                        <td class="fw-bold text-dark text-uppercase small">{{$carpeta->usuario}}</td>
                        <td class="small">{{$carpeta->dni}}</td>
                        <td class="small">{{$carpeta->telefono}}</td>
                        <td class="small">{{$carpeta->correo}}</td>
                        <td>
                            <button type="button" class="btn btn-sm btn-outline-info  px-3" data-bs-toggle="modal" data-bs-target="#modalResumen{{ $carpeta->id }}">
                                <i class="bi bi-eye-fill me-1"></i> Ver Resumen
                            </button>

                            <div class="modal fade" id="modalResumen{{ $carpeta->id }}" tabindex="-1" aria-labelledby="label{{ $carpeta->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content border-0 shadow-lg">
                                        <div class="modal-header bg-primary text-white">
                                            <h5 class="modal-title fw-bold" id="label{{ $carpeta->id }}">
                                                <i class="bi bi-file-text me-2"></i>Resumen de Solicitud
                                            </h5>
                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body p-4 text-start">
                                            <div class="mb-2">
                                                <small class="text-muted fw-bold text-uppercase">Contenido del FUT:</small>
                                            </div>
                                            <div class="p-3 bg-light rounded border border-primary-subtle text-dark shadow-sm">
                                                {{ $carpeta->resumen }}
                                            </div>

                                            <div class="mt-3 d-flex justify-content-between small">
                                                <span class="text-muted italic">ID de Carpeta: #{{ $carpeta->id }}</span>
                                                <span class="text-muted">Estado: <strong class="text-warning">{{ $carpeta->estado }}</strong></span>
                                            </div>
                                        </div>
                                        <div class="modal-footer border-0 bg-light">
                                            <button type="button" class="btn btn-secondary px-4 shadow-sm" data-bs-modal="modal" data-bs-dismiss="modal">Cerrar</button>
                                            @if($carpeta->estado === 'pendiente')
                                            <a href="{{ route('admin.editar-carpeta', $carpeta->id) }}" class="btn btn-primary px-4 shadow-sm">
                                                Gestionar Carpeta
                                            </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td><span class="badge bg-light-secondary">{{$carpeta->cargo}}</span></td>
                        <td class="text-center">
                            <span class="badge bg-light-warning text-warning-emphasis border border-warning-subtle px-3 py-2">
                                <i class="bi bi-clock-history me-1"></i> {{$carpeta->estado}}
                            </span>
                        </td>
                        <td class="small">{{$carpeta->fecha}}</td>
                        <td>
                            <div class="d-flex">
                                <a class="btn btn-primary" href="{{ route('profesor.carpeta.editar',['id'=>$carpeta->id]) }}"><i class="bi bi-pen"></i></a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="10">
                            <div class="container text-center p-4 fs-5">
                                NO TIENE CARPETAS PENDIENTES<i class="bi bi-emoji-laughing mx-2 fs-3"></i>
                            </div>
                        </td>
                    </tr>
                    @endempty
                </tbody>
            </table>
        </div>
    </div>
</div>