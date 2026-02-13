<div class="card shadow-sm border-0 p-4">
    <div class="d-flex align-items-center mb-4">
        <div class="bg-primary text-white rounded-3 p-2 me-3">
            <i class="bi bi-file-earmark-text-fill fs-3"></i>
        </div>
        <h2 class="fw-bold text-dark mb-0">Memorandos Recibidos</h2>
    </div>
    <div class="row g-3 mb-5">
        <div class="col-12 col-sm-6 col-xl-3">
            <x-partials.complements.cardinfo title="Memorandos Emitidos I Modulo" content="{{ $memorandos }}">
                <i class="bi bi-collection-fill fs-4"></i>
            </x-partials.complements.cardinfo>
        </div>
        <div class="col-12 col-sm-6 col-xl-3">
            <x-partials.complements.cardinfo title="Memorandos Emitidos I Modulo" content="{{ $memo_primer_ciclo }}">
                <i class="bi bi-1-circle-fill fs-4"></i>
            </x-partials.complements.cardinfo>
        </div>
        <div class="col-12 col-sm-6 col-xl-3">
            <x-partials.complements.cardinfo title="Memorandos Emitidos II Modulo" content="{{ $memo_segundo_ciclo }}">
                <i class="bi bi-2-circle-fill fs-4"></i>
            </x-partials.complements.cardinfo>
        </div>
        <div class="col-12 col-sm-6 col-xl-3">
            <x-partials.complements.cardinfo title="Memorandos Emitidos III Modulo" content="{{ $memo_tercer_ciclo }}">
                <i class="bi bi-3-circle-fill fs-4"></i>
            </x-partials.complements.cardinfo>
        </div>
    </div>
    <div class="row g-2 justify-content-end border-bottom pb-4 mb-3">
        <div class="col-12 col-md-2">
            <label class="form-label fw-semibold small text-secondary">Modulo</label>
            <select class="form-select border-2 shadow-sm" wire:model.live="modulo">
                <option value="">Todos</option>
                <option value="I">I</option>
                <option value="II">II</option>
                <option value="III">III</option>
            </select>
        </div>
        <div class="col-12 col-md-2">
            <label class="form-label fw-semibold small text-secondary">Mes</label>
            <select class="form-select border-2 shadow-sm" wire:model.live="mes">
                <option value="">Todos</option>
                <option value="1">Enero</option>
                <option value="2">Febrero</option>
                <option value="3">Marzo</option>
                <option value="4">Abril</option>
                <option value="5">Mayo</option>
                <option value="6">Junio</option>
                <option value="7">Julio</option>
                <option value="8">Agosto</option>
                <option value="9">Setiembre</option>
                <option value="10">Ocutbre</option>
                <option value="11">Nomviembre</option>
                <option value="12">Diciembre</option>
            </select>
        </div>
         <div class="col-12 col-md-2">
            <label class="form-label fw-semibold small text-secondary">Año</label>
            <select class="form-select border-2 shadow-sm" wire:model.live="anio">
                <option value="">Todos</option>
                <option value="2026">2026</option>
                <option value="2025">2025</option>
                <option value="2024">2024</option>
                <option value="2023">2023</option>
                <option value="2022">2022</option>
                <option value="2021">2021</option>
                <option value="2020">2020</option>
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
                    <tr>
                        <th class="px-3">#</th>
                        <th>Asunto</th>                        
                        <th>Modulo</th>
                        <th>Fecha Emision</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($this->recibidos() as $memorandon)
                    <tr>
                        <td class="px-3 fw-bold text-muted">{{$memorandon->id}}</td>
                        <td>
                            <button
                                wire:click="verAsunto({{ $memorandon->id }})"
                                data-bs-toggle="modal"
                                data-bs-target="#modalAsunto"
                                class="btn btn-sm btn-outline-primary shadow-sm border-0">
                                <i class="bi bi-envelope-at-fill me-2"></i>Ver Asunto
                            </button>
                        </td>
                        <td><span class="badge bg-light-secondary">{{$memorandon->modulo}}</span></td>
                        <td class="fw-semibold"> {{$memorandon->fecha_emision}}</td>
                        <td>
                            <div class="btn-group shadow-sm">
                                <a target="_blank" href="{{ route('profesor.generar.pdf',['id'=>$memorandon->id]) }}" class="btn btn-sm btn-outline-danger"><i class="bi bi-file-earmark-pdf-fill"></i></a>                                
                                <a href="{{ route('profesor.descargar.pdf',['id'=>$memorandon->id]) }}" class="btn btn-sm btn-outline-success"><i class="bi bi-file-arrow-down-fill"></i></a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center py-5">
                            <i class="bi bi-file-earmark-x fs-1 text-muted d-block mb-2"></i>
                            <p class="text-muted">No has Memorandos Emitidos.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-3">
            {{$this->recibidos()->links()}}
        </div>
    </div>
     <div class="card shadow-sm border-0 p-4">
        <div wire:ignore.self class="modal fade" id="modalAsunto" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0 shadow-lg rounded-4">
                    <div class="modal-header border-bottom-0 pb-0">
                        <h5 class="modal-title fw-bold text-primary">
                            <i class="bi bi-file-earmark-text me-2"></i>Detalle del Memorando
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body py-4">
                        @if($selectedMemo)
                        <div class="mb-3">
                            <label class="small text-muted text-uppercase fw-bold">Profesor:</label>
                            <p class="fw-semibold text-dark">{{ $selectedMemo->profesor }}</p>
                        </div>
                        <div class="bg-light p-3 rounded-3 border">
                            <label class="small text-muted text-uppercase fw-bold d-block mb-2">Asunto</label>
                            <p class="text-secondary mb-0" style="white-space: pre-line; font-size: 0.95rem;">
                                {{ $selectedMemo->asunto ?? 'Sin contenido detallado.' }}
                            </p>
                        </div>
                        <div class="mt-3 text-end text-muted small">
                            Emitido el {{ \Carbon\Carbon::parse($selectedMemo->created_at)->format('d/m/Y H:i') }}
                        </div>
                        @else
                        <div class="text-center py-5">
                            <div class="spinner-border text-primary" role="status"></div>
                            <p class="mt-2 text-muted">Cargando...</p>
                        </div>
                        @endif
                    </div>
                    <div class="modal-footer border-top-0">
                        <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        @script
        <script>
            $wire.on('notificacion-toast', (data) => {
                // Aquí podrías disparar el Swal que configuramos antes
            });
        </script>
        @endscript
    </div>
</div>