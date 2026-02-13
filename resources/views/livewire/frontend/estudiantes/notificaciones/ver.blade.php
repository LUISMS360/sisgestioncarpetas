<div class="container-fluid py-4">
    <div class="d-flex align-items-center mb-3">
        <a href="{{ route('estudiante.notificaciones') }}" class="btn btn-light rounded-circle border-0 shadow-sm me-3" title="Volver">
            <i class="bi bi-arrow-left fs-5"></i>
        </a>
        <div class="btn-group shadow-sm">
            <button class="btn btn-white bg-white border-0" title="Archivar">
                <i class="bi bi-archive text-muted"></i>
            </button>
            <button class="btn btn-white bg-white border-0" title="Marcar como spam">
                <i class="bi bi-exclamation-octagon text-muted"></i>
            </button>
            <button class="btn btn-white bg-white border-0" title="Eliminar">
                <i class="bi bi-trash text-muted"></i>
            </button>
        </div>
    </div>

    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body p-4 p-md-5">
            <div class="d-flex justify-content-between align-items-start mb-4">
                <h2 class="fw-normal text-dark flex-grow-1" style="font-size: 1.4rem;">
                    {{ $titulo }}
                    @if($estado == 'pendiente')
                    <span class="badge bg-primary-subtle text-primary ms-2" style="font-size: 0.7rem; vertical-align: middle;">NUEVO</span>
                    @endif
                </h2>
                <button class="btn btn-sm btn-light border-0">
                    <i class="bi bi-printer"></i>
                </button>
            </div>

            <div class="d-flex align-items-center mb-5">
                <div class="avatar-md bg-info text-white rounded-circle d-flex align-items-center justify-content-center fw-bold me-3"
                    style="width: 48px; height: 48px; font-size: 1.2rem;">
                    {{ substr($emisor, 0, 1) }}
                </div>
                <div class="flex-grow-1">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span class="fw-bold text-dark">{{ $emisor }}</span>
                            <span class="text-muted small ms-1">&lt;notificaciones@sistema.com&gt;</span>
                        </div>
                        <div class="text-muted small d-flex align-items-center">
                            {{ $created_at->format('d M. Y, H:i') }}
                            <span class="ms-2">({{ $created_at->diffForHumans() }})</span>
                            <button class="btn btn-link btn-sm text-muted p-0 ms-2"><i class="bi bi-star"></i></button>
                            <button class="btn btn-link btn-sm text-muted p-0 ms-2"><i class="bi bi-reply-fill"></i></button>
                        </div>
                    </div>
                    <div class="text-muted small">
                        para mí <i class="bi bi-caret-down-fill" style="font-size: 0.6rem;"></i>
                    </div>
                </div>
            </div>

            <div class="notificacion-contenido text-dark lh-base" style="font-size: 0.95rem; white-space: pre-line;">
                {{ $contenido }}
            </div>
        </div>
    </div>
    <style>
        .btn-white:hover {
            background-color: #f8f9fa !important;
            color: #212529;
        }

        .notificacion-contenido {
            color: #3c4043;
            max-width: 800px;
        }

        .avatar-md {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Animación suave para la entrada */
        .card {
            animation: fadeIn 0.3s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</div>