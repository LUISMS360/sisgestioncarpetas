<div class="card p-4">
    <h1 class="mt-3 mb-5">CREAR CARPETA</h1>
    <div class="row">
        <div class="col-12 col-sm-3">
            <x-partials.complements.cardinfo title="Emitidas (ultimo mes)" content="{{ $this->carpetasUltimoMes() }}">
                <i class="bi bi-file-bar-graph-fill text-primary fs-4"></i>
            </x-partials.complements.cardinfo>

        </div>
       <div class="col-12 col-sm-3">
            <x-partials.complements.cardinfo title="Emitidas (estudiantes)" content="{{ $this->carpetasEstudiantes() }}">
                <i class="bi bi-person-square text-primary fs-4"></i>
            </x-partials.complements.cardinfo>
        </div>
        <div class="col-12 col-sm-3">
            <x-partials.complements.cardinfo title="Emitidas (egresados)" content="{{ $this->carpetasEgresados() }}">
                <i class="bi bi-person-fill-up text-primary fs-4"></i>
            </x-partials.complements.cardinfo>
        </div>
        <div class="col-12 col-sm-3">
            <x-partials.complements.cardinfo title="Emitidas (egresados)" content="{{ $this->carpetasTotales() }}">
                <i class="bi bi-archive-fill text-primary fs-4"></i>
            </x-partials.complements.cardinfo>
        </div>
    </div>
    <x-partials.complements.search wire:model.live="dni" label="Busque el fut por dni" desc="Busque de una manera mas eficiente" />
    <h4 class="mt-2 mb-2">FUTS RECIENTES</h4>
    <div class="container-fluid">
        <div class="table-responsive card">
            <table class="table table-hover align-middle mb-0">
                <thead class="table">
                    <tr>
                        <th scope="col" class="text-center">#</th>
                        <th scope="col">Resumen</th>
                        <th scope="col">Datos</th>
                        <th scope="col">DNI</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Cargo</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Fecha</th>
                        <th scope="col" class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($this->futs as $fut)
                    <tr class="">
                        <td class="text-center fw-bold text-muted">{{ $fut->id }}</td>
                        <td class="p-4">
                            <div class="text-wrap" style="min-width: 150px;">{{ $fut->resumen }}</div>
                        </td>
                        <td>{{ $fut->datos }}</td>
                        <td>{{ $fut->dni }}</td>
                        <td><small>{{ $fut->correo }}</small></td>
                        <td>{{ $fut->cargo }}</td>
                        <td>
                            @if($fut->estado == 'revisado')
                            <span class="badge rounded-pill bg-light-info text-dark">Revisado</span>
                            @elseif($fut->estado == 'pendiente')
                            <span class="badge rounded-pill bg-warning text-dark">Pendiente</span>
                            @else
                            <span class="badge rounded-pill bg-light-warning">{{ $fut->estado }}</span>
                            @endif
                        </td>
                        <td class="text-nowrap">{{ $fut->fecha }}</td>
                        <td>
                            <div class="d-flex gap-2 justify-content-center">
                                <button class="btn btn-sm btn-primary"
                                    wire:click="agregarCarpeta('{{ $fut->id }}')"
                                    title="Agregar carpeta">
                                    <i class="bi bi-folder-plus"></i>
                                </button>
                                <button class="btn btn-sm btn-danger"
                                    wire:click="confimarEliminacion('{{ $fut->id }}')"
                                    title="Eliminar">
                                    <i class="bi bi-trash3-fill"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="text-center py-5 text-muted">
                            <i class="bi bi-emoji-frown fs-2 d-block mb-2"></i>
                            NO SE HAN ENCONTRADO FUTS ASOCIADOS
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{$this->futs->links()}}
    </div>
    @if($this->futs->isNotEmpty())
    <div class="container-fluid mt-2">
        <h5>Asignación de Supervisor</h5>
        <ul class="list-group list-group-numbered">
            @foreach ($this->profesores() as $profesor)
            <li class="list-group-item d-flex flex-column flex-md-row align-items-center py-3 px-3">

                <div class="d-flex align-items-center flex-grow-1 mb-2 mb-md-0 w-100 px-2">
                    <div class="avatar bg-dark bg-light text-white rounded-circle d-flex align-items-center justify-content-center me-2 shadow-sm"
                        style="width: 38px; height: 38px; min-width: 38px;">
                        <span style="font-size: 0.8rem;">{{ $profesor->initials }}</span>
                    </div>

                    <div class="d-flex flex-column me-2">
                        <h6 class="mb-0 text-dark fw-bold small text-truncate" style="max-width: 180px;">{{ $profesor->name }}</h6>
                        <small class="text-muted" style="font-size: 0.7rem;">{{ $profesor->email }}</small>
                    </div>

                    <span class="badge bg-light-primary text-primary px-2 py-1 rounded-pill d-none d-lg-inline-block" style="font-size: 0.65rem;">
                        Profesor
                    </span>
                </div>

                <div class="flex-shrink-0">
                    <button class="btn btn-success btn-sm rounded-pill px-5 w-100 w-md-auto shadow-sm"
                        style="min-width: 50px; height: 32px; font-size: 0.85rem;" wire:click="designarProfesor('{{ $profesor->id }}')">
                        <i class="bi bi-plus-lg"></i>
                        <span class="d-md-none d-lg-inline">Añadir</span>
                    </button>
                </div>

            </li>
            @endforeach
        </ul>
    </div>
    @endif
    <div>
        @script
        <script>
            Livewire.on('fut-no-encontrado', (e) => {
                Swal.fire({
                    icon: "error",
                    title: "Fut No Encontrado",
                    text: "El fut no se encuentra, registrelo ahora",
                    footer: '<a href="#">registrar Fut?</a>'
                });
            });
            Livewire.on('profesor-vacio', (e) => {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "No ha desiganado a un profesor Supervisor!",
                });
            });
            Livewire.on('fut-revisado', (e) => {
                Swal.fire({
                    icon: "warning",
                    title: "Fut Revisado",
                    text: "El fut selecionado ya ha sido revisado",
                });
            });
            Livewire.on('profesor-no-encontrado', (e) => {
                Swal.fire({
                    icon: "question",
                    title: "El profesor no existe",
                    text: "Selecione de la lista de profesores",
                });
            });
            Livewire.on('profesor-designado', (e) => {
                Swal.fire({
                    icon: "success",
                    title: "Profesor Desiganado!",
                    text: e.name + " Supervisor de la carpeta",
                    draggable: true
                });
            });
            Livewire.on('carpeta-creada', (e) => {
                Swal.fire({
                    icon: "success",
                    title: "Carpeta Creada!",
                    text: "La carpeta se ha creado de manera exitosa!",
                    draggable: true
                });
            });
            Livewire.on('confirmar-eliminacion-fut', (e) => {
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: "btn btn-success",
                        cancelButton: "btn btn-danger me-2"
                    },
                    buttonsStyling: false
                });
                swalWithBootstrapButtons.fire({
                    title: "Desea eliminar el FUT?",
                    text: "No se podra revertir la accion!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Si, deseo eliminar!",
                    cancelButtonText: "No, cancelar!",
                    reverseButtons: true
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.dispatch('eliminar-fut', e.id);
                    } else if (
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire({
                            title: "Cancelado",
                            text: "La accion se ha cancelado",
                            icon: "error"
                        });
                    }
                });
            });
            Livewire.on('fut-eliminado', (e) => {
                Swal.fire({
                    title: "Fut " + e.id + " Eliminado Correctamente!",
                    icon: "success",
                    draggable: true
                });
            });
        </script>
        @endscript
    </div>
</div>