<?php

namespace App\Livewire\Frontend\Profesores\Carpetas;

use App\Models\Carpeta;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Pendientes extends Component
{
    #[Layout('layouts.profesor.app')]
    #[Title('Carpetas Pendientes')]


    #[Computed]
    public function carpetas(){
        return Carpeta::with(['profesor','fut'])
        ->where('estado','pendiente')
        ->where('profesor_id',auth()->user()->id)->paginate(10);
    }
    public function render()
    {
        return view('livewire.frontend.profesores.carpetas.pendientes');
    }
}
