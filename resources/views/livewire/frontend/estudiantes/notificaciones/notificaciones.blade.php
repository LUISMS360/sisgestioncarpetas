<div class="card p-4 container-fluid">

    <style>
        body{
            background-color: white;
        }        
        .table tbody tr {
            transition: all 0.2s ease;
        }

        .table-hover tbody tr:hover {
            background-color: rgba(13, 110, 253, 0.04) !important;
        }

        .avatar-sm {
            flex-shrink: 0;
        }

        .card-body::-webkit-scrollbar {
            width: 6px;
        }

        .card-body::-webkit-scrollbar-thumb {
            background: #e0e0e0;
            border-radius: 10px;
        }

        .card-body::-webkit-scrollbar-thumb:hover {
            background: #d1d1d1;
        }
    </style>

    <h1 class="mb-4 fw-bold text-secondary">NOTIFICACIONES</h1>

    <div class="">
        <div class="card-header bg-white py-3">
            <div class="d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between gap-3">
                <div class="d-flex align-items-center">
                    <div class="dropdown me-2">
                        <button class="btn btn-light btn-sm rounded-circle border-0 shadow-sm" type="button" data-bs-toggle="dropdown">
                            <i class="bi bi-list fs-5"></i>
                        </button>
                        <ul class="dropdown-menu shadow border-0">
                            <li>
                                <button class="dropdown-item py-2" wire:click="marcarLeidos">
                                    <i class="bi bi-check2-all me-2 text-success"></i> Marcar todo como leído
                                </button>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <button class="dropdown-item py-2" wire:click="$refresh">
                                    <i class="bi bi-arrow-clockwise me-2 text-primary"></i> Actualizar
                                </button>
                            </li>
                        </ul>
                    </div>
                    <h5 class="fw-bold mb-0 text-primary fs-6 fs-md-5"><i class="bi bi-bell-fill me-2"></i>Centro de Notificaciones</h5>
                </div>
                <span class="badge bg-primary-subtle text-primary rounded-pill px-3 py-2">
                    {{ $totalNotificaciones }} <span class="d-none d-sm-inline">Mensajes</span><span class="d-inline d-sm-none">Notifs.</span>
                </span>
            </div>
        </div>

        <div class="card-body p-0" style="max-height: 600px; overflow-y: auto;">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="sticky-top bg-white shadow-sm d-none d-md-table-header-group" style="z-index: 1;">
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
                        <tr wire:key="notif-{{ $notificacion->id }}" class="d-flex flex-column d-md-table-row border-bottom px-3 py-2 p-md-0">

                            <td class="ps-md-4 border-0 pb-1 pb-md-3">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm bg-info-subtle text-info rounded-circle d-flex align-items-center justify-content-center fw-bold me-2 flex-shrink-0" style="width: 35px; height: 35px; font-size: 0.8rem;">
                                        {{ substr($notificacion->emisor->name ?? 'S', 0, 1) }}
                                    </div>
                                    <div class="small fw-semibold text-dark">
                                        {{ $notificacion->emisor->name ?? 'Sistema' }}
                                        <span class="text-muted d-block d-md-inline ms-md-1" style="font-size: 0.7rem;">• {{$notificacion->emisor->rol}}</span>
                                    </div>
                                    <div class="ms-auto d-md-none text-muted" style="font-size: 0.7rem;">
                                        {{ $notificacion->created_at->diffForHumans() }}
                                    </div>
                                </div>
                            </td>

                            <td class="border-0 pt-0 pb-2 pb-md-3">
                                <div class="fw-bold text-dark mb-0" style="font-size: 0.9rem;">{{ $notificacion->titulo }}</div>
                                <div class="text-muted small text-wrap text-md-truncate" style="max-width: 450px;">
                                    {{ $notificacion->contenido }}
                                </div>
                            </td>

                            <td class="border-0 py-1 py-md-3 d-flex d-md-table-cell align-items-center gap-2">
                                @if($notificacion->estado == 'pendiente')
                                <span class="badge bg-warning-subtle text-warning border border-warning-subtle px-2">
                                    <i class="bi bi-alarm-fill me-1"></i>{{$notificacion->estado}}
                                </span>
                                @elseif($notificacion->estado == 'leido')
                                <span class="badge bg-success-subtle text-success border border-success-subtle px-2">
                                    <i class="bi bi-check-all me-1"></i>{{$notificacion->estado}}
                                </span>
                                @endif

                                <div class="d-none d-md-block text-center small text-muted w-100">
                                    <span class="d-block">{{ $notificacion->created_at->format('d/m/Y') }}</span>
                                    <span style="font-size: 0.7rem;">{{ $notificacion->created_at->diffForHumans() }}</span>
                                </div>
                            </td>

                            <td class="pe-md-4 text-start text-md-end border-0 pt-2 pb-3 pb-md-3">
                                <div class="btn-group shadow-sm w-100 w-md-auto">
                                    <a class="btn btn-light btn-sm py-2 py-md-1" href="{{ route('estudiante.notificacion',['id'=>$notificacion->id]) }}" wire:navigate>
                                        <i class="bi bi-eye"></i> <span class="d-md-none ms-1">Ver</span>
                                    </a>
                                    <button class="btn btn-light btn-sm py-2 py-md-1 text-success" wire:click="marcarLeido('{{ $notificacion->id }}')">
                                        <i class="bi bi-check-all"></i> <span class="d-md-none ms-1">Leído</span>
                                    </button>
                                    <button class="btn btn-light btn-sm py-2 py-md-1 text-danger" wire:click="eliminar('{{ $notificacion->id }}')">
                                        <i class="bi bi-trash"></i> <span class="d-md-none ms-1">Eliminar</span>
                                    </button>
                                </div>
                            </td>

                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">No hay notificaciones nuevas</td>
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
        Toast.fire({
            icon: "success",
            title: "Eliminado con éxito",
            iconColor: '#d33'
        });
    });

    $wire.on('notificacion-leida', () => {
        Toast.fire({
            icon: "success",
            title: "Marcada como leída",
            iconColor: '#0d6efd'
        });
    });

    $wire.on('notificaciones-leidas', () => {
        Swal.fire({
            title: "¡Todo al día!",
            text: "Has marcado todas las notificaciones como leídas.",
            icon: "success",
            confirmButtonColor: "#0d6efd",
            customClass: {
                popup: 'rounded-4 border-0',
                confirmButton: 'btn btn-primary px-4'
            },
            buttonsStyling: false
        });
    });
</script>
@endscript
</div>