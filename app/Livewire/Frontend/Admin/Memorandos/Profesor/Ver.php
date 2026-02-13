<?php

namespace App\Livewire\Frontend\Admin\Memorandos\Profesor;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Ver extends Component
{
    #[Layout('layouts.admin.app')]
    #[Title('Profesor Memo')]
    public function render()
    {
        return view('livewire.frontend.admin.memorandos.profesor.ver');
    }
}
