<div class="py-4">
    <div class="card shadow-sm border-0 p-3">
        <div class="card-header bg-white border-0 pt-4 px-4">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
                <div>
                    <h2 class="fw-bold text-dark mb-1">Carpetas Pendientes</h2>
                    <p class="text-muted small mb-0">Listado de expedientes en proceso que requieren seguimiento.</p>
                </div>

                <div class="d-flex align-items-center gap-2 p-2 rounded-3 border">
                    <label class="small fw-bold text-muted px-2 text-nowrap mb-0">MÓDULO:</label>
                    <select class="form-select form-select-sm border-0 bg-transparent fw-bold "
                        wire:model.live="modulo" style="min-width: 120px;">
                        <option value="">Ver Todos</option>
                        <option value="I">Módulo I</option>
                        <option value="II">Módulo II</option>
                        <option value="III">Módulo III</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="card-body p-0 mt-3">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class=" text-muted small text-uppercase fw-bold">
                        <tr>
                            <th class="px-4 py-3 border-0">Solicitud / Sumilla</th>
                            <th class="py-3 border-0">Estudiante</th>
                            <th class="py-3 border-0">Contacto</th>
                            <th class="py-3 border-0">Profesor / Supervisor</th>
                            <th class="py-3 border-0 text-center">Estado</th>
                            <th class="py-3 border-0">Fecha Creación</th>
                        </tr>
                    </thead>
                    <tbody class="border-top-0">
                        @forelse($this->carpetas() as $carpeta)
                        <tr>
                            <td class="px-4">
                                <div class="text-truncate fw-medium text-dark" style="max-width: 220px;" title="{{$carpeta->resumen}}">
                                    {{ Str::limit($carpeta->resumen, 45) }}
                                </div>
                                <span class="badge bg-warning-subtle text-warning-emphasis" style="font-size: 0.65rem;">
                                    {{ $modulo ? 'MOD '.$modulo : 'PENDIENTE' }}
                                </span>
                            </td>
                            <td>
                                <div class="fw-bold text-dark small text-uppercase">{{$carpeta->estudiante}}</div>
                                <div class="text-muted small" style="font-size: 0.75rem;">DNI: {{$carpeta->dni}}</div>
                            </td>
                            <td>
                                <div class="d-flex flex-column small text-muted">
                                    <span><i class="bi bi-envelope me-1"></i> {{$carpeta->correo}}</span>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-xs bg-dark text-white rounded-circle d-flex align-items-center justify-content-center me-2 shadow-sm"
                                        style="width: 30px; height: 30px; font-size: 0.75rem;">
                                        {{ substr($carpeta->profesor, 0, 1) }}
                                    </div>
                                    <span class="small fw-semibold text-secondary">{{$carpeta->profesor}}</span>
                                </div>
                            </td>
                            <td class="text-center">
                                <span class="badge bg-light-warning text-warning border border-warning-subtle px-3 py-2 rounded-pill fw-bold">
                                    <i class="bi bi-hourglass-split me-1"></i> {{$carpeta->estado}}
                                </span>
                            </td>
                            <td>
                                <div class="d-flex flex-column">
                                    <span class="small fw-bold text-dark">{{ \Carbon\Carbon::parse($carpeta->creacion)->format('d/m/Y') }}</span>
                                    <span class="text-muted" style="font-size: 0.7rem;">Hace {{ \Carbon\Carbon::parse($carpeta->creacion)->diffForHumans(null, true) }}</span>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-5">
                                <div class="py-5">
                                    <div class="mb-3">
                                        <i class="bi bi-clipboard-check fs-1 text-success opacity-50"></i>
                                    </div>
                                    <h5 class="fw-bold text-dark">No hay carpetas pendientes</h5>
                                    <p class="text-muted">Todas las carpetas de este módulo han sido gestionadas.</p>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        @if(method_exists($this->carpetas(), 'links'))
        <div class="card-footer bg-white border-0 py-3 rounded-bottom border-top">
            <div class="d-flex justify-content-center">
                {{$this->carpetas()->links()}}
            </div>
        </div>
        @endif
    </div>
    <style>
        /* Efecto hover diferenciado para pendientes */
        .table-hover tbody tr:hover {
            background-color: rgba(255, 193, 7, 0.04) !important;
            transition: all 0.2s ease-in-out;
        }

        .avatar-xs {
            background: linear-gradient(45deg, #212529, #495057);
        }
    </style>
</div>