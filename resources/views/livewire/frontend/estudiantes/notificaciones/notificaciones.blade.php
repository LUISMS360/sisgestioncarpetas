<div class="card p-4">
    <h1>NOTIFICACIONES</h1>
    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3">
            <div class="d-flex align-items-center justify-content-between">
                <h5 class="fw-bold mb-0 text-primary">
                    <i class="bi bi-bell-fill me-2"></i>Centro de Notificaciones
                </h5>
                <span class="badge bg-primary-subtle text-primary rounded-pill px-3">
                    {{ $notificaciones->count() }} Mensajes
                </span>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="">
                        <tr>
                            <th class="ps-4 py-3 text-muted small text-uppercase" style="width: 200px;">Emisor</th>
                            <th class="py-3 text-muted small text-uppercase">Mensaje</th>
                            <th class="py-3 text-muted small text-uppercase text-center">Fecha</th>
                            <th class="pe-4 py-3 text-muted small text-uppercase text-end">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($notificaciones as $notificacion)
                        <tr>
                            <td class="ps-4">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm bg-info-subtle text-info rounded-circle d-flex align-items-center justify-content-center fw-bold me-2"
                                        style="width: 32px; height: 32px; font-size: 0.8rem;">
                                        {{ substr($notificacion->emisor->name ?? 'S', 0, 1) }}
                                    </div>
                                    <div class="small fw-semibold text-dark">
                                        {{ $notificacion->emisor->name ?? 'Sistema' }} ({{$notificacion->emisor->rol}})
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="fw-bold text-dark mb-0" style="font-size: 0.9rem;">
                                    {{ $notificacion->titulo }}
                                </div>
                                <div class="text-muted small" style="max-width: 400px;">
                                    {{ $notificacion->contenido }}
                                </div>
                            </td>
                            <td class="text-center small text-muted">
                                {{ $notificacion->created_at->format('d/m/Y') }}<br>
                                <span style="font-size: 0.7rem;">{{ $notificacion->created_at->diffForHumans() }}</span>
                            </td>
                            <td class="pe-4 text-end">
                                <div class="btn-group shadow-sm" role="group">
                                    <button class="btn btn-sm btn-outline-primary border-0" title="Ver detalle">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger border-0" title="Eliminar">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center py-5 text-muted">
                                <i class="bi bi-chat-left-dots fs-1 d-block mb-3 opacity-25"></i>
                                No tienes notificaciones nuevas
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        @if($notificaciones->hasPages())
        <div class="card-footer bg-white border-0 py-3">
            {{ $notificaciones->links() }}
        </div>
        @endif
    </div>

    <style>
        .table tbody tr {
            transition: all 0.2s ease;
            cursor: pointer;
        }

        .table-hover tbody tr:hover {
            background-color: rgba(13, 110, 253, 0.03) !important;
        }

        .avatar-sm {
            flex-shrink: 0;
        }
    </style>
</div>