<div class="container-fluid p-4 card">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <h1 class="fw-bold text-secondary mb-0">
            <span class="text-primary text-uppercase">|</span> PROFESORES
        </h1>
        <div class="col-12 col-md-4 col-lg-3">
            <x-partials.complements.search label="Buscar profesor..." />
        </div>
    </div>

    <div class="row g-4">
        @foreach ($this->profesores() as $profesor)
        <div class="col-12 col-md-6 col-lg-3">
            <div class="card h-100 border-0 shadow-sm hover-shadow transition-all">
                <div class="text-center pt-4">
                    <img src="{{ $profesor->profile_photo_url ?? 'https://ui-avatars.com/api/?name='.urlencode($profesor->name).'&color=7F9CF5&background=EBF4FF' }}"
                        class="rounded-circle shadow-sm border border-3 border-white"
                        style="width: 100px; height: 100px; object-fit: cover;"
                        alt="{{ $profesor->name }}">
                </div>

                <div class="card-body text-center">
                    <h5 class="card-title fw-bold mb-1 text-dark">{{ $profesor->name }}</h5>
                    <p class="text-muted small mb-3">
                        <i class="bi bi-envelope-at me-1"></i> {{ $profesor->email }}
                    </p>

                    <span class="badge rounded-pill bg-light text-primary px-3 border border-primary-subtle">
                        Docente Activo
                    </span>
                </div>

                <div class="card-footer bg-transparent border-0 pb-4 text-center">
                    <button class="btn btn-outline-primary btn-sm rounded-pill px-4">
                        Ver Perfil
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <style>
        /* Un pequeño toque de CSS para que se sienta premium */
        .hover-shadow:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1) !important;
        }

        .transition-all {
            transition: all 0.3s ease;
        }
    </style>
</div>