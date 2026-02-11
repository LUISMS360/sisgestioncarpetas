<?php

namespace App\Livewire\Frontend\Admin;

use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Dashboard extends Component
{
    #[Layout('layouts.admin.app')]
    #[Title('Dashboard-Admin')]

    

    #[Computed]
    public function estudiantes(){
        return User::where('rol','estudiante')->count();
    }

    #[Computed]
    public function egresados(){
        return User::where('rol','egresado')->count();
    }

    #[Computed]
    public function profesores(){
        return User::where('rol','profesor')->count();
    }

    
    public function render()
    {
        return view('livewire.frontend.admin.dashboard');
    }
}
