<div class="py-4">
    <div class="card shadow-sm border-0 p-3">
        <div class="card-header bg-white border-0 pt-4 px-4">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
                <div>
                    <h2 class="fw-bold text-dark mb-1">Carpetas Gestionadas</h2>
                    <p class="text-muted small mb-0">Listado histórico de expedientes finalizados y archivados.</p>
                </div>

                <div class="d-flex align-items-center gap-2 p-2 rounded-3 border">
                    <label class="small fw-bold text-muted px-2 text-nowrap mb-0">MÓDULO:</label>
                    <select class="form-select form-select-sm border-0 bg-transparent fw-bold text-primary"
                        wire:model.live="modulo" style="min-width: 120px;">
                        <option value="">Todos</option>
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
                            <th class="px-4 py-3 border-0">Expediente / Resumen</th>
                            <th class="py-3 border-0">Estudiante</th>
                            <th class="py-3 border-0">Contacto</th>
                            <th class="py-3 border-0">Profesor Asignado</th>
                            <th class="py-3 border-0 text-center">Estado</th>
                            <th class="py-3 border-0">Fecha Registro</th>
                        </tr>
                    </thead>
                    <tbody class="border-top-0">
                        @forelse($this->carpetas() as $carpeta)
                        <tr>
                            <td class="px-4">
                                <div class="text-truncate fw-medium text-dark" style="max-width: 220px;" title="{{$carpeta->resumen}}">
                                    {{ Str::limit($carpeta->resumen, 50) }}
                                </div>
                                <small class="text-primary fw-bold" style="font-size: 0.7rem;">MOD-{{ $modulo ?? 'N/A' }}</small>
                            </td>
                            <td>
                                <div class="fw-bold text-uppercase small">{{$carpeta->estudiante}}</div>
                                <div class="text-muted small" style="font-size: 0.75rem;">DNI: {{$carpeta->dni}}</div>
                            </td>
                            <td>
                                <div class="d-flex flex-column small">
                                    <span class="text-muted"><i class="bi bi-envelope-fill me-1 opacity-50"></i> {{$carpeta->correo}}</span>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-xs bg-info-subtle text-info rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 28px; height: 28px; font-size: 0.7rem;">
                                        <i class="bi bi-person-check-fill"></i>
                                    </div>
                                    <span class="small fw-semibold text-secondary">{{$carpeta->profesor}}</span>
                                </div>
                            </td>
                            <td class="text-center">
                                <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2 rounded-pill">
                                    <i class="bi bi-shield-check me-1"></i> {{$carpeta->estado}}
                                </span>
                            </td>
                            <td>
                                <div class="d-flex flex-column">
                                    <span class="small fw-bold text-dark">{{ \Carbon\Carbon::parse($carpeta->creacion)->format('d/m/Y') }}</span>
                                    <span class="text-muted" style="font-size: 0.7rem;">{{ \Carbon\Carbon::parse($carpeta->creacion)->format('h:i A') }}</span>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center py-5">
                                <div class="py-4">
                                    <i class="bi bi-folder-x fs-1 text-muted opacity-25"></i>
                                    <h5 class="fw-light mt-3">No hay carpetas gestionadas en este módulo</h5>
                                    <button wire:click="$set('modulo', '')" class="btn btn-sm btn-link text-decoration-none">Ver todas las carpetas</button>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        @if(method_exists($this->carpetas(), 'links'))
        <div class="card-footer bg-white border-0 py-3 shadow-sm rounded-bottom">
            <div class="d-flex justify-content-center">
                {{$this->carpetas()->links()}}
            </div>
        </div>
        @endif
    </div>
    <style>
        .table-hover tbody tr:hover {
            background-color: rgba(13, 110, 253, 0.02) !important;
            transition: all 0.2s;
        }

        .form-select:focus {
            box-shadow: none;
            border-color: transparent;
        }
    </style>
</div>