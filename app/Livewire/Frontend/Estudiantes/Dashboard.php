<?php

namespace App\Livewire\Frontend\Estudiantes;

use App\Models\Carpeta;
use App\Models\Fut;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Dashboard extends Component
{
    #[Layout('layouts.estudiante.app')]
    #[Title('Dashboard - Estudiantes')]


    public $revisados;
    
    public function mount(){
        $futs = Fut::where('estado','revisado')->where('user_id',Auth::id())->count();
        $carpetas = DB::table('carpetas as c')->join('futs as f','f.id','=','c.fut_id')->where('f.user_id',Auth::id())->count();
        $this->revisados = $futs+$carpetas;
    }


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

    
    public function render()
    {
        return view('livewire.frontend.estudiantes.dashboard');
    }
}
