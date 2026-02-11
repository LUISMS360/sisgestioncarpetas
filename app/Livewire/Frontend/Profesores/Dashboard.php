<?php

namespace App\Livewire\Frontend\Profesores;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Dashboard extends Component
{
    #[Layout('layouts.profesor.app')]
    #[Title('Dashboard - Profesor')]
    public function render()
    {
        return view('livewire.frontend.profesores.dashboard');
    }
}
