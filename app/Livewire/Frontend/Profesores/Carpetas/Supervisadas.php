<?php

namespace App\Livewire\Frontend\Profesores\Carpetas;

use App\Models\Carpeta;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Supervisadas extends Component
{
    #[Layout('layouts.profesor.app')]
    #[Title('Carpetas Supervisadas')]

    #[Computed]
    public function carpetas(){
        return Carpeta::with(['profesor','fut'])
        ->where('estado','revisado')
        ->where('profesor_id',auth()->user()->id)->paginate(10);
    }
    public function render()
    {
        return view('livewire.frontend.profesores.carpetas.supervisadas');
    }
}
