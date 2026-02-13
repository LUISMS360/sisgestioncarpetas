<?php

namespace App\Livewire\Frontend\Profesores;

use App\Models\Carpeta;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Dashboard extends Component
{
    #[Layout('layouts.profesor.app')]
    #[Title('Dashboard - Profesor')]

    public $pendientes;
    public $revisadas;
    public function mount(){
        $this->pendientes = Carpeta::where('estado','pendiente')->where('profesor_id',Auth::id())->count();
        $this->revisadas = Carpeta::where('estado','revisado')->where('profesor_id',Auth::id())->count();
    }
    public function render()
    {
        return view('livewire.frontend.profesores.dashboard');
    }
}
