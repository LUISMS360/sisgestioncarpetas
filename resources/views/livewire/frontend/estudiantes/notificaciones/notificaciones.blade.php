<div class="card p-4">
    
    <style>
        .table tbody tr { transition: all 0.2s ease; }
        .table-hover tbody tr:hover { background-color: rgba(13, 110, 253, 0.04) !important; }
        .avatar-sm { flex-shrink: 0; }
        .card-body::-webkit-scrollbar { width: 6px; }
        .card-body::-webkit-scrollbar-thumb { background: #e0e0e0; border-radius: 10px; }
        .card-body::-webkit-scrollbar-thumb:hover { background: #d1d1d1; }
    </style>

    <h1 class="mb-4 fw-bold text-secondary">NOTIFICACIONES</h1>

    <div class="card shadow-sm border-0">
        <div class="card-header bg-white py-3">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <div class="dropdown me-3">
                        <button class="btn btn-light btn-sm rounded-circle border-0 shadow-sm" type="button" data-bs-toggle="dropdown">
                            <i class="bi bi-list fs-5"></i>
                        </button>
                        <ul class="dropdown-menu shadow border-0">
                            <li>
                                <button class="dropdown-item py-2" wire:click="marcarLeidos">
                                    <i class="bi bi-check2-all me-2 text-success"></i> Marcar todo como leído
                                </button>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <button class="dropdown-item py-2" wire:click="$refresh">
                                    <i class="bi bi-arrow-clockwise me-2 text-primary"></i> Actualizar
                                </button>
                            </li>
                        </ul>
                    </div>
                    <h5 class="fw-bold mb-0 text-primary"><i class="bi bi-bell-fill me-2"></i>Centro de Notificaciones</h5>
                </div>
                <span class="badge bg-primary-subtle text-primary rounded-pill px-3">
                    {{ $totalNotificaciones }} Mensajes
                </span>
            </div>
        </div>

        <div class="card-body p-0" style="max-height: 600px; overflow-y: auto;">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="sticky-top bg-white shadow-sm" style="z-index: 1;">
                        <tr>
                            <th class="ps-4 py-3 text-muted small text-uppercase" style="width: 200px;">Emisor</th>
                            <th class="py-3 text-muted small text-uppercase">Mensaje</th>
                            <th class="py-3 text-muted small text-uppercase">Estado</th>
                            <th class="py-3 text-muted small text-uppercase text-center">Fecha</th>
                            <th class="pe-4 py-3 text-muted small text-uppercase text-end">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($notificaciones as $notificacion)
                        <tr wire:key="notif-{{ $notificacion->id }}">
                            <td class="ps-4">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm bg-info-subtle text-info rounded-circle d-flex align-items-center justify-content-center fw-bold me-2" style="width: 32px; height: 32px; font-size: 0.8rem;">
                                        {{ substr($notificacion->emisor->name ?? 'S', 0, 1) }}
                                    </div>
                                    <div class="small fw-semibold text-dark">
                                        {{ $notificacion->emisor->name ?? 'Sistema' }}
                                        <span class="text-muted d-block" style="font-size: 0.7rem;">{{$notificacion->emisor->rol}}</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="fw-bold text-dark mb-0" style="font-size: 0.9rem;">{{ $notificacion->titulo }}</div>
                                <div class="text-muted small text-truncate" style="max-width: 400px;">{{ $notificacion->contenido }}</div>
                            </td>
                            @if($notificacion->estado == 'pendiente')
                                <td><span class="badge bg-light-warning"><i class="bi bi-alarm-fill me-2"></i>{{$notificacion->estado}}</span></td>
                            @elseif($notificacion->estado == 'leido')
                                <td><span class="badge bg-light-success"><i class="bi bi-check-all me-2"></i>{{$notificacion->estado}}</span></td>
                            @endif  
                            <td class="text-center small text-muted">
                                {{ $notificacion->created_at->format('d/m/Y') }}<br>
                                <span style="font-size: 0.7rem;">{{ $notificacion->created_at->diffForHumans() }}</span>
                            </td>
                            <td class="pe-4 text-end">
                                <div class="btn-group shadow-sm">
                                    <a class="btn btn-sm btn-outline-primary border-0" href="{{ route('estudiante.notificacion',['id'=>$notificacion->id]) }}" wire:navigate>
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <button class="btn btn-sm btn-outline-success border-0" wire:click="marcarLeido('{{ $notificacion->id }}')">
                                        <i class="bi bi-check-all"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger border-0" wire:click="eliminar('{{ $notificacion->id }}')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center py-5 text-muted">No hay notificaciones nuevas</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($notificaciones->count() < $totalNotificaciones)
                <div x-intersect="$wire.loadMore()" class="text-center py-4 bg-light-subtle border-top">
                    <div class="spinner-border spinner-border-sm text-primary"></div>
                    <span class="text-muted small ms-2">Cargando más...</span>
                </div>
            @endif
        </div>
    </div>

    @script
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true
        });

        $wire.on('notificacion-eliminada', () => {
            Toast.fire({ icon: "success", title: "Eliminado con éxito", iconColor: '#d33' });
        });

        $wire.on('notificacion-leida', () => {
            Toast.fire({ icon: "success", title: "Marcada como leída", iconColor: '#0d6efd' });
        });

        $wire.on('notificaciones-leidas', () => {
            Swal.fire({
                title: "¡Todo al día!",
                text: "Has marcado todas las notificaciones como leídas.",
                icon: "success",
                confirmButtonColor: "#0d6efd",
                customClass: { popup: 'rounded-4 border-0', confirmButton: 'btn btn-primary px-4' },
                buttonsStyling: false
            });
        });
    </script>
    @endscript
</div> 
