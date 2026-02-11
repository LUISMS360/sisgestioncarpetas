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

    
    public function crearFut(){
        $this->formFut->create();
        $admins = User::where('rol','admin')->get();
        foreach($admins as $admin){
            Notificacion::create([
                'user_id'=> $admin->id,
                'titulo'=>'Nuevo fut emitido',
                'contenido'=> 'Se ha emitido un nuevo fut revisar el contenido',
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
