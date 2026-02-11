<div class="card p-3">
    <div class="row">
        <h1 class="mb-3">FUTS PENDIENTES</h1>
        <div class="col-12 col-lg-4 col-6">            
            <x-partials.complements.cardinfo title="Futs Egresados" content="{{ $this->egresados() }}">
                <i class="bi bi-person-fill-up text-primary fs-4"></i>
            </x-partials.complements.cardinfo>
        </div>
        <div class="col-12 col-lg-4 col-6">
            <x-partials.complements.cardinfo title="Futs Estudiantes" content="{{ $this->estudiantes() }}">
                    <i class="bi bi-person-fill-up text-primary fs-4"></i>
            </x-partials.complements.cardinfo>
        </div>
        <div class="col-12 col-lg-4 col-6">
            <x-partials.complements.cardinfo title="Futs Otros" content="{{ $this->otros() }}">
                    <i class="bi bi-person-fill-up text-primary fs-4"></i>
            </x-partials.complements.cardinfo>
        </div>
        <div class="container p-4">                        
            <div class="d-flex justify-content-end">
                <label for="" class="fw-bold text-end mb-3 fs-5">Filtros Busqueda</label>
            </div>
            <div class="d-flex flex-wrap gap-3 justify-content-end align-items-center">
                <button class="btn btn-sm btn-outline-primary" wire:click="filCiclo('I')">I Ciclo</button>
                <button class="btn btn-sm btn-outline-primary" wire:click="filCiclo('II')">II Ciclo</button>
                <button class="btn btn-sm btn-outline-primary" wire:click="filCiclo('III')">III Ciclo</button>
                <button class="btn btn-sm btn-outline-primary" wire:click="filCiclo('IV')">IV Ciclo</button>
                <button class="btn btn-sm btn-outline-primary" wire:click="filCiclo('V')">V Ciclo</button>
                <button class="btn btn-sm btn-outline-primary" wire:click="filCiclo('VI')">VI Ciclo</button>

                <div class="col-12 col-md-auto">
                    <select
                        class="form-select form-select-sm"
                        wire:model.live="anioEgreso"
                        id="anioEgreso">
                        <option value="">Año Egreso</option>
                        <option value="2025">2025</option>
                        <option value="2024">2024</option>
                        <option value="2023">2023</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="">
            <div class="row">
                <div class="col-12 col-lg-4 col-md-6">
                    <label for="" class="fw-bold fs-5">Busqueda: </label>
                    <x-partials.complements.search label="Busque por DNI" wire:model.live="dni" />
                </div>
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
                                <td><span class="badge bg-light-warning">{{$fut->estado}}</span></td>
                                <td>{{$fut->fecha}}</td>
                                <td><div class="d-flex">
                                    <button class="btn btn-sm btn-danger me-2"><i class="bi bi-trash3-fill"></i></button>
                                    <button class="btn btn-sm btn-primary"><i class="bi bi-pen"></i></button>
                                </div></td>
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
</div>