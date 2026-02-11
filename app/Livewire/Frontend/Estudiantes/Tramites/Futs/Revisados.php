<?php

namespace App\Livewire\Frontend\Estudiantes\Tramites\Futs;

use App\Models\Fut;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Revisados extends Component
{
    #[Layout('layouts.estudiante.app')]
    #[Title('Futs - Revisados')]

     #[Computed]
    public function futs()
    {
        return Fut::select(
            'id',
            'nombres_apellidos as nombres',
            'telefonos as telefono',
            'correo',
            'documento_identidad as dni',
            'resumen_solicitud as resumen',
            'cargo_actual as cargo',
            'fundamentacion_pedido as fundamentacion',
            'estado',
            'fecha'
        )
        ->where('estado', 'completo')
        ->where('user_id',auth()->user()->id)
        ->paginate(10);
    }
    public function render()
    {
        return view('livewire.frontend.estudiantes.tramites.futs.revisados');
    }
}
