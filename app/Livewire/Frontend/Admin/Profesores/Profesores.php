<?php

namespace App\Livewire\Frontend\Admin\Profesores;

use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Profesores extends Component
{
    #[Layout('layouts.admin.app')]
    #[Title('Profesores')]

    public $dni;

    #[Computed]
    public function profesores(){
        return User::where('rol','profesor')->paginate(10);
    }
    public function render()
    {
        return view('livewire.frontend.admin.profesores.profesores');
    }
}
