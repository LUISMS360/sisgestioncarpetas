<div class="py-3">
    <div class="card shadow-sm border-0 p-3">
        <div class="card-header bg-white border-0 py-4 px-4">
            <div class="d-flex align-items-center justify-content-between">
                <div>
                    <h2 class="fw-bold text-dark mb-1">FUTS Revisados</h2>
                    <p class="text-muted small mb-0">Historial de solicitudes que ya han sido procesadas y completadas.</p>
                </div>
                <div class="bg-success-subtle text-success p-2 rounded-3">
                    <i class="bi bi-check-all fs-3"></i>
                </div>
            </div>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light text-muted small text-uppercase fw-bold">
                        <tr>
                            <th class="px-4 py-3 border-0">ID</th>
                            <th class="py-3 border-0">Solicitante</th>
                            <th class="py-3 border-0">Contacto</th>
                            <th class="py-3 border-0">Trámite / Sumilla</th>
                            <th class="py-3 border-0 text-center">Cargo</th>
                            <th class="py-3 border-0 text-center">Detalle</th>
                            <th class="py-3 border-0 text-center">Estado</th>
                            <th class="py-3 border-0">Fecha Procesado</th>
                        </tr>
                    </thead>
                    <tbody class="border-top-0">
                        @forelse($this->futs as $fut)
                        <tr>
                            <td class="px-4 text-muted fw-bold">#{{$fut->id}}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm me-3 bg-success-subtle text-success rounded-circle d-flex align-items-center justify-content-center fw-bold border border-success-subtle" style="width: 35px; height: 35px; min-width: 35px;">
                                        {{ substr($fut->nombres, 0, 1) }}
                                    </div>
                                    <div class="text-dark fw-semibold small text-uppercase">{{$fut->nombres}}</div>
                                </div>
                            </td>
                            <td>
                                <div class="small fw-bold text-dark mb-1"><i class="bi bi-card-heading me-1 text-primary"></i> {{$fut->dni}}</div>
                                <div class="text-muted d-flex flex-column" style="font-size: 0.75rem;">
                                    <span><i class="bi bi-envelope me-1"></i> {{$fut->correo}}</span>
                                    <span><i class="bi bi-phone me-1"></i> {{$fut->telefono}}</span>
                                </div>
                            </td>
                            <td>
                                <div class="text-wrap small text-muted" style="max-width: 200px;" title="{{$fut->resumen}}">
                                    {{ Str::limit($fut->resumen, 60) }}
                                </div>
                            </td>
                            <td class="text-center">
                                <span class="badge rounded-pill bg-light-primary text-primary border border-primary-subtle px-3 fw-normal">
                                    {{$fut->cargo}}
                                </span>
                            </td>
                            <td class="text-center">
                                <x-partials.complements.modal :fundamentacion="$fut->fundamentacion" />
                            </td>
                            <td class="text-center">
                                <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2">
                                    <i class="bi bi-check-circle-fill me-1"></i> {{$fut->estado}}
                                </span>
                            </td>
                            <td class="text-nowrap small">
                                <span class="text-dark">{{ \Carbon\Carbon::parse($fut->fecha)->format('d/m/Y') }}</span>
                                <div class="text-muted" style="font-size: 0.7rem;">Finalizado</div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center py-5">
                                <div class="d-flex flex-column align-items-center py-4">
                                    <div class="bg-light rounded-circle p-4 mb-3">
                                        <i class="bi bi-archive fs-1 text-muted"></i>
                                    </div>
                                    <h5 class="fw-bold text-dark">No hay registros revisados</h5>
                                    <p class="text-muted px-5">Aún no se han procesado trámites o los filtros actuales no coinciden.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card-footer bg-white border-0 py-3 shadow-sm rounded-bottom">
            <div class="d-flex justify-content-center">
                {{$this->futs->links()}}
            </div>
        </div>
    </div>
    <style>
        /* Efectos de Hover y Transiciones */
        .table-hover tbody tr:hover {
            background-color: #f0fff4 !important;
            /* Un toque verde muy suave al pasar el mouse */
            transition: all 0.2s ease-in-out;
        }

        .badge {
            font-weight: 500;
            letter-spacing: 0.3px;
        }
    </style>
</div>