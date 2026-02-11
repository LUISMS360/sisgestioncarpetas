<div>
    <div class="card mt-2 p-3">
        <h1>FUTS PENDIENTES</h1>
        <div
            class="table-responsive">
            <table
                class="table">
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
                    </tr>
                    @empty
                    <tr>
                        <td colspan="10" class="text-center p-4">NO TIENES FUTS PENDIENTES <i class="bi bi-emoji-laughing"></i></td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            {{$this->futs->links()}}
        </div>
    </div>
</div>