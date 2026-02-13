<?php

namespace App\Livewire\Frontend\Estudiantes\Tramites\Carpetas;

use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Gestionadas extends Component
{
    use WithPagination;
    #[Layout('layouts.estudiante.app')]
    #[Title('Futs Pendientes')]

    #[Url]
    public $modulo = '';

    public function updateModulo(){
        $this->resetPage();
    }

    #[Computed]
    public function carpetas(){
         return DB::table('carpetas as c')
            ->select('c.id as id','f.resumen_solicitud as resumen','f.datos_del_solicitante as estudiante','f.documento_identidad as dni',
            'f.correo as correo','p.name as profesor','c.estado as estado','c.created_at as creacion')
            ->join('futs as f','f.id','=','c.fut_id')
            ->join('users as p','p.id','=','c.profesor_id')
            ->where('f.user_id',auth()->user()->id)
            ->where('c.estado','revisado')
            ->paginate(10);
    }
    public function render()
    {
        return view('livewire.frontend.estudiantes.tramites.carpetas.gestionadas');
    }
}
