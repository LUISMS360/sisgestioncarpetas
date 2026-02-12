<?php

namespace App\Livewire\Frontend\Estudiantes\Tramites\Futs;

use App\Livewire\Forms\FormFut;
use App\Models\Notificacion;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Crear extends Component
{
    #[Layout('layouts.estudiante.app')]
    #[Title('Crear - Fut')]

    public FormFut $formFut;

    public function mount(){
        $this->formFut->datos_del_solicitante = auth()->user()->name;
        $this->formFut->nombres_apellidos = auth()->user()->name;
        $this->formFut->documento_identidad = auth()->user()->dni;
        $this->formFut->telefonos = auth()->user()->telefono;
        $this->formFut->correo = auth()->user()->email;
        $this->formFut->cargo_actual = auth()->user()->rol;
    }
    public function crearFut(){
        $mensaje = $this->formFut->resumen_solicitud;
        $this->formFut->create();
        $admins = User::where('rol','admin')->get();
        foreach($admins as $admin){
            Notificacion::create([
                'user_id'=> $admin->id,
                'titulo'=>'Nuevo fut emitido',
                'contenido'=> $mensaje,
                'emisor_id'=>auth()->user()->id,
            ]);
        }
        $this->dispatch('create-fut');
    }

    public function render()
    {
        return view('livewire.frontend.estudiantes.tramites.futs.crear');
    }
}
