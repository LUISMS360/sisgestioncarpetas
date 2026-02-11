<?php

namespace App\Livewire\Frontend\Estudiantes;

use App\Models\Carpeta;
use App\Models\Fut;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Dashboard extends Component
{
    #[Layout('layouts.estudiante.app')]
    #[Title('Dashboard - Estudiantes')]

    #[Computed]
    public function carpetas(){
        return DB::table('carpetas as c')
            ->join('futs as f','f.id','=','c.fut_id')
            ->join('users as u','u.id','=','f.user_id')
            ->where('f.user_id',auth()->user()->id)
            ->count();
    }

    #[Computed]
    public function futs(){
        return DB::table('futs')
        ->where('user_id',auth()->user()->id)->count();
    }

    #[Computed]
    public function documentosRevisados(){
        return DB::table('futs')
        ->where('estado','completo')
        ->where('user_id',auth()->user()->id)->count();
    }
    public function render()
    {
        return view('livewire.frontend.estudiantes.dashboard');
    }
}
