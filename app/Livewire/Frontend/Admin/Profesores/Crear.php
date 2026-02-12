<?php

namespace App\Livewire\Frontend\Admin\Profesores;

use App\Livewire\Forms\FormProfesor;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Crear extends Component
{
    #[Layout('layouts.admin.app')]
    #[Title('Profesores - Crear')]

    public FormProfesor $form;

    public function create(){
        $this->form->save();
        $this->dispatch('profesor-creado');
    }
    public function render()
    {
        return view('livewire.frontend.admin.profesores.crear');
    }
}
