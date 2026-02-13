<?php

namespace App\Livewire\Frontend\Profesores\Memorandos;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Ver extends Component
{
    #[Layout('layouts.profesor.app')]
    #[Title('Ver Memo')]
    public function render()
    {
        return view('livewire.frontend.profesores.memorandos.ver');
    }
}
