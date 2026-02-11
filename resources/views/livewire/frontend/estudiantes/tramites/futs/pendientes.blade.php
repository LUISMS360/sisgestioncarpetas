<div class="py-3">
    <div class="card shadow-sm border-0 p-3">
        <div class="card-header bg-white border-0 py-4 px-4">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <h2 class="fw-bold text-dark mb-1">FUTS Pendientes</h2>
                    <p class="text-muted small mb-0">Gestione las solicitudes de trámites que aún no han sido procesadas.</p>
                </div>
                <div class="bg-warning-subtle text-warning p-2 rounded-3">
                    <i class="bi bi-clock-history fs-3"></i>
                </div>
            </div>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class=" text-muted small text-uppercase fw-bold">
                        <tr>
                            <th class="px-4 py-3 border-0">ID</th>
                            <th class="py-3 border-0">Solicitante</th>
                            <th class="py-3 border-0">Contacto</th>
                            <th class="py-3 border-0">Trámite / Resumen</th>
                            <th class="py-3 border-0">Cargo</th>
                            <th class="py-3 border-0 text-center">Fundamentación</th>
                            <th class="py-3 border-0">Estado</th>
                            <th class="py-3 border-0">Fecha</th>
                        </tr>
                    </thead>
                    <tbody class="border-top-0">
                        @forelse($this->futs as $fut)
                        <tr>
                            <td class="px-4">
                                <span class="fw-bold text-primary">#{{$fut->id}}</span>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm me-3 bg-secondary-subtle text-secondary rounded-circle d-flex align-items-center justify-content-center fw-bold" style="width: 35px; height: 35px; min-width: 35px;">
                                        {{ substr($fut->nombres, 0, 1) }}
                                    </div>
                                    <div class="text-dark fw-semibold small text-uppercase">{{$fut->nombres}}</div>
                                </div>
                            </td>
                            <td>
                                <div class="small mb-1"><i class="bi bi-card-text me-1"></i> {{$fut->dni}}</div>
                                <div class="text-muted" style="font-size: 0.75rem;">
                                    <i class="bi bi-envelope me-1"></i> {{$fut->correo}}<br>
                                    <i class="bi bi-telephone me-1"></i> {{$fut->telefono}}
                                </div>
                            </td>
                            <td>
                                <div class="text-truncate small fw-medium" style="max-width: 180px;" title="{{$fut->resumen}}">
                                    {{$fut->resumen}}
                                </div>
                            </td>
                            <td>
                                <span class="badge rounded-pill bg-light text-dark border px-3">
                                    {{$fut->cargo}}
                                </span>
                            </td>
                            <td class="text-center">
                                <x-partials.complements.modal :fundamentacion="$fut->fundamentacion" />
                            </td>
                            <td>
                                <span class="badge bg-warning-subtle text-warning border border-warning-subtle px-3 py-2">
                                    <i class="bi bi-dot"></i> {{$fut->estado}}
                                </span>
                            </td>
                            <td class="text-nowrap small text-muted">
                                {{ \Carbon\Carbon::parse($fut->fecha)->format('d/m/Y') }}
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="py-5">
                                <p class="text-center fs-5">NO TIENES FUTS PENDIENTES<i class="bi bi-emoji-laughing mx-2 fs-3"></i></p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-footer bg-white border-0 py-3">
            <div class="d-flex justify-content-center">
                {{$this->futs->links()}}
            </div>
        </div>
    </div>
    <style>
    /* Estilos sutiles para mejorar el hover */
    .table-hover tbody tr:hover {
        background-color: #f8f9ff !important;
        transition: background-color 0.2s ease;
    }
    .avatar-sm {
        font-size: 0.8rem;
        border: 1px solid #dee2e6;
    }
</style>
</div>

