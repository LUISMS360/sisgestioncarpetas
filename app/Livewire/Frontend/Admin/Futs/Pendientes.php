<?php

namespace App\Livewire\Frontend\Admin\Futs;

use App\Models\Fut;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Pendientes extends Component
{
    use WithPagination;
    #[Layout('layouts.admin.app')]
    #[Title('Futs Pendientes')]

    #[Url(history:true)]
    public $dni='';

    #[Url(history:true)]
    public $anioEgreso = '';

    #[Url(history:true)]
    public $ciclo= '';

    public $turno;
    #[Computed]
    public function egresados(){
        return Fut::where('cargo_actual','egresado')->count();
    }

    #[Computed]
    public function estudiantes(){
        return Fut::where('cargo_actual','estudiante')->count();
    }

    #[Computed]
    public function otros(){
        return Fut::where('cargo_actual','otros')->count();
    }

    public function updateDni(){
        $this->resetPage();
    }

    #[Computed]
    public function futs(){
        return Fut::select('id','nombres_apellidos as nombres',
        'telefonos as telefono','correo','documento_identidad as dni','resumen_solicitud as resumen'
        ,'cargo_actual as cargo','fundamentacion_pedido as fundamentacion','estado','fecha')
        ->whereLike('documento_identidad','%'.$this->dni.'%')
        ->when($this->ciclo,function (Builder $q) {
            $q->where('ciclo',$this->ciclo);
        })
        ->when($this->anioEgreso,function (Builder $q) {
            $q->where('anio_egresado',$this->anioEgreso);
        })
        ->where('estado','recibido')
        ->orderBy('id','desc')
        ->paginate(10);

    }
    public function render()
    {
        return view('livewire.frontend.admin.futs.pendientes');
    }
}
