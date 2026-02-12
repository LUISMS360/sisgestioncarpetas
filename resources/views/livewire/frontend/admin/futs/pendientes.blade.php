<div class="card shadow-sm border-0 p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold text-dark mb-0">Futs Pendientes</h2>
    </div>
    <div class="row g-3 mb-4">
        <div class="col-12 col-md-4">
            <x-partials.complements.cardinfo title="Futs Egresados" content="{{ $this->egresados() }}">
                <i class="bi bi-person-badge-fill text-primary fs-3"></i>
            </x-partials.complements.cardinfo>
        </div>
        <div class="col-12 col-md-4">
            <x-partials.complements.cardinfo title="Futs Estudiantes" content="{{ $this->estudiantes() }}">
                <i class="bi bi-mortarboard-fill text-success fs-3"></i>
            </x-partials.complements.cardinfo>
        </div>
        <div class="col-12 col-md-4">
            <x-partials.complements.cardinfo title="Futs Otros" content="{{ $this->otros() }}">
                <i class="bi bi-people text-dark fs-3"></i>
            </x-partials.complements.cardinfo>
        </div>
        <div class=" p-4 rounded-4 mb-5 border">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h5 class="fw-bold mb-1">Localizar FUT</h5>
                    <p class="text-muted small mb-3">Ingrese el DNI del solicitante para vincularlo a una nueva carpeta.</p>
                    <x-partials.complements.search label="Busque por DNI" wire:model.live="dni" desc="busque el fut por dni" />
                </div>
                <div class="col-md-4 text-center d-none d-md-block">
                    <i class="bi bi-search text-primary opacity-25" style="font-size: 5rem;"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="row g-2 justify-content-end border-bottom pb-4 mb-3">
        <div class="col-12 col-md-2">
            <label class="form-label fw-semibold small text-secondary">Cargo</label>
            <select class="form-select border-2 shadow-sm" wire:model.live="ciclo">
                <option value="">Todos</option>
                <option value="egresado">Egresado</option>
                <option value="estudiante">Estudiante</option>
            </select>
        </div>

        <div class="col-12 col-md-2">
            <label class="form-label fw-semibold small text-secondary">Ciclo</label>
            <select class="form-select border-2 shadow-sm" wire:model.live="ciclo">
                <option value="">Todos</option>
                <option value="I">I</option>
                <option value="II">II</option>
                <option value="III">III</option>
                <option value="IV">IV</option>
                <option value="V">V</option>
                <option value="VI">VI</option>
            </select>
        </div>

        <div class="col-12 col-md-2">
            <label class="form-label fw-semibold small text-secondary">Año Egreso</label>
            <select class="form-select border-2 shadow-sm" wire:model.live="anioEgreso">
                <option value="">Todos</option>
                <option value="2025">2025</option>
                <option value="2024">2024</option>
                <option value="2023">2023</option>
            </select>
        </div>
    </div>
    <div class="">
        <div class="row">
            <div
                class="table-responsive">
                <table
                    class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombres</th>
                            <th scope="col">DNI</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Resumen</th>
                            <th scope="col">Cargo</th>
                            <th scope="col">Fundamentacion</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($this->futs as $fut)
                        <tr>
                            <td>{{$fut->id}}</td>
                            <td>{{$fut->nombres}}</td>
                            <td>{{$fut->dni}}</td>
                            <td>{{$fut->telefono}}</td>
                            <td>{{$fut->correo}}</td>
                            <td>{{$fut->resumen}}</td>
                            <td>{{$fut->cargo}}</td>
                            <td><x-partials.complements.modal :fundamentacion="$fut->fundamentacion" /> </td>
                            <td><span class="badge bg-light-warning text-warning-emphasis border border-warning-subtle px-3 py-2"><i class="bi bi-clock-history me-2"></i>{{$fut->estado}}</span></td>
                            <td>{{$fut->fecha}}</td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-sm btn-danger"><i class="bi bi-trash3-fill"></i></button>
                                    <button class="btn btn-sm btn-primary"><i class="bi bi-pen"></i></button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10" class="text-center p-4">NO HAY REGISTROS <i class="bi bi-emoji-frown"></i></td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                {{$this->futs->links()}}
            </div>
        </div>
    </div>
</div>