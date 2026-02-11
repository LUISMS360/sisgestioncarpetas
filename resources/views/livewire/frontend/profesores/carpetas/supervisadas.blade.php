<div class="card p-3">
    <h1>CARPETAS SUPERVISADAS</h1>
    <div class="">
        <div
            class="table-responsive">
            <table
                class="table mt-5">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Dni</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Resumen</th>
                        <th scope="col">Cargo</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($this->carpetas() as $carpeta)
                    <tr>
                        <td>{{$carpeta->id}}</td>
                        <td>{{$carpeta->fut->datos_del_solicitante}}</td>
                        <td>{{$carpeta->fut->documento_identidad}}</td>
                        <td>{{$carpeta->fut->telefonos}}</td>
                        <td>{{$carpeta->fut->correo}}</td>
                        <td>
                            <button type="button" class="btn btn-sm btn-outline-info  px-3" data-bs-toggle="modal" data-bs-target="#modalResumen{{ $carpeta->id }}">
                                <i class="bi bi-eye-fill me-1"></i> Ver Resumen
                            </button>

                            <div class="modal fade" id="modalResumen{{ $carpeta->id }}" tabindex="-1" aria-labelledby="label{{ $carpeta->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content border-0 shadow-lg">
                                        <div class="modal-header bg-primary text-white">
                                            <h5 class="modal-title fw-bold" id="label{{ $carpeta->id }}">
                                                <i class="bi bi-file-text me-2"></i>Resumen de Solicitud
                                            </h5>
                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body p-4 text-start">
                                            <div class="mb-2">
                                                <small class="text-muted fw-bold text-uppercase">Contenido del FUT:</small>
                                            </div>
                                            <div class="p-3 bg-light rounded border border-primary-subtle text-dark shadow-sm">
                                                {{ $carpeta->fut->resumen_solicitud }}
                                            </div>

                                            <div class="mt-3 d-flex justify-content-between small">
                                                <span class="text-muted italic">ID de Carpeta: #{{ $carpeta->id }}</span>
                                                <span class="text-muted">Estado: <strong class="text-warning">{{ $carpeta->estado }}</strong></span>
                                            </div>
                                        </div>
                                        <div class="modal-footer border-0 bg-light">
                                            <button type="button" class="btn btn-secondary px-4 shadow-sm" data-bs-modal="modal" data-bs-dismiss="modal">Cerrar</button>
                                            @if($carpeta->estado === 'pendiente')
                                            <a href="{{ route('admin.editar-carpeta', $carpeta->id) }}" class="btn btn-primary px-4 shadow-sm">
                                                Gestionar Carpeta
                                            </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>{{$carpeta->fut->cargo_actual}}</td>
                        <td>{{$carpeta->estado}}</td>
                        <td>{{$carpeta->created_at}}</td>
                        <td>
                            <div class="d-flex">
                                <a class="btn btn-primary" href="{{ route('profesor.carpeta.editar',['id'=>$carpeta->id]) }}"><i class="bi bi-pen"></i></a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="10">
                            <div class="container text-center p-4 fs-5">
                                NO TIENE CARPETAS PENDIENTES<i class="bi bi-emoji-laughing mx-2 fs-3"></i>
                            </div>                            
                        </td>
                    </tr>
                    @endempty
                </tbody>
            </table>
        </div>
    </div>
</div>