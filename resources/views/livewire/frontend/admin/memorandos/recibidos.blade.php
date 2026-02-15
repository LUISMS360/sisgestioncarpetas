<div class="card shadow-sm border-0 p-4">
    <div class="d-flex align-items-center mb-4">
        <div class="bg-primary text-white rounded-3 p-2 me-3">
            <i class="bi bi-file-earmark-text-fill fs-3"></i>
        </div>
        <h2 class="fw-bold text-dark mb-0">Memorandos</h2>
    </div>
    <div class="row g-3 mb-5">
        <div class="col-12 col-sm-6 col-xl-4">
            <x-partials.complements.cardinfo title="Emitidas" content="">
                <i class="bi bi-calendar-check text-primary fs-4"></i>
            </x-partials.complements.cardinfo>
        </div>
        <div class="col-12 col-sm-6 col-xl-4">
            <x-partials.complements.cardinfo title="Revisados" content="">
                <i class="bi bi-check-all fs-4 text-primary"></i>
            </x-partials.complements.cardinfo>
        </div>
        <div class="col-12 col-sm-6 col-xl-4">
            <x-partials.complements.cardinfo title="Pendientes" content="">
                <i class="bi bi-hourglass-split fs-4 text-warning"></i>
            </x-partials.complements.cardinfo>
        </div>
    </div>
    <div class=" p-4 rounded-4 mb-5 border">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h5 class="fw-bold mb-1">Localizar Memorando</h5>
                <p class="text-muted small mb-3">Ingrese el nombre del Profesor</p>
                <x-partials.complements.search wire:model.live="nombre" label="Búsqueda por nombre" desc="Presione enter para filtrar" />
            </div>
            <div class="col-md-4 text-center d-none d-md-block">
                <i class="bi bi-search text-primary opacity-25" style="font-size: 5rem;"></i>
            </div>
        </div>
    </div>
    <div class="row g-2 justify-content-end border-bottom pb-4 mb-3">
        <div class="col-12 col-md-2">
            <label class="form-label fw-semibold small text-secondary">Cargo</label>
            <select class="form-select border-2 shadow-sm">
                <option value="">Todos</option>
                <option value="estudiante">Estudiante</option>
                <option value="egresado">Egresado</option>
                <option value="otro">Otro</option>
            </select>
        </div>
        <div class="col-12 col-md-2">
            <label class="form-label fw-semibold small text-secondary">Cargo</label>
            <select class="form-select border-2 shadow-sm">
                <option value="">Todos</option>
                <option value="estudiante">Estudiante</option>
                <option value="egresado">Egresado</option>
                <option value="otro">Otro</option>
            </select>
        </div>
        <div class="col-12 col-md-2">
            <label class="form-label fw-semibold small text-secondary">Cargo</label>
            <select class="form-select border-2 shadow-sm">
                <option value="">Todos</option>
                <option value="estudiante">Estudiante</option>
                <option value="egresado">Egresado</option>
                <option value="otro">Otro</option>
            </select>
        </div>
    </div>
    <div class="mb-5">
         <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="fw-bold mb-0 text-secondary">Memorandos Recientes</h4>
            <span class="badge bg-primary-subtle text-primary rounded-pill">Resultados: </span>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <th>#</th>
                    <th>Profesor</th>
                    <th>Correo</th>
                    <th>Asunto</th>
                    <th>Fecha Emision</th>
                    <th>Modulo</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>