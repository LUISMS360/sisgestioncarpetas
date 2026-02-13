<?php

namespace App\Livewire\Frontend\Profesores\Carpetas;

use App\Models\Carpeta;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Pendientes extends Component
{
    #[Layout('layouts.profesor.app')]
    #[Title('Carpetas Pendientes')]


    public $dni; 
    public $cargo;
    public $mes; 
    public $anio;

    public $egresados;
    public $estudiantes; 
    public $carpetas;
    public function mount(){
        $this->carpetas = DB::table('carpetas as c')
        ->join('futs as f','f.id','=','c.fut_id')
        ->where('c.estado','pendiente')
        ->count();
        $this->egresados = DB::table('carpetas as c')
        ->join('futs as f','f.id','=','c.fut_id')
        ->where('f.cargo_actual','egresado')
        ->where('c.estado','pendiente')
        ->count();
        $this->estudiantes = DB::table('carpetas as c')
        ->join('futs as f','f.id','=','c.fut_id')
        ->where('f.cargo_actual','estudiante')
        ->where('c.estado','pendiente')
        ->count();
    }
    #[Computed]
    public function carpetas(){
        return DB::table('carpetas as c')
            ->select(
                'c.id as id',
                'f.datos_del_solicitante as usuario',
                'f.documento_identidad as dni',
                'f.telefonos as telefono',
                'f.correo as correo',
                'f.resumen_solicitud as resumen',
                'f.cargo_actual as cargo',
                'c.estado as estado',
                'c.created_at as fecha',
            )
            ->join('futs as f', 'f.id', '=', 'c.fut_id')
            ->join('users as u', 'u.id', '=', 'c.profesor_id')
            ->where('c.estado', 'pendiente')
            ->when($this->anio, function ($query) {
                $query->whereYear('c.created_at', $this->anio);
            })
            ->when($this->cargo, function ($query) {
                $query->where('f.cargo_actual', $this->cargo);
            })
            ->when($this->mes, function ($query) {
                $query->whereMonth('c.created_at', $this->mes);
            })
            ->when($this->dni, function ($query) {
                $query->where('f.documento_identidad', 'like', '%' . $this->dni . '%');
            })
            ->where('profesor_id',Auth::id())
            ->orderBy('c.id', 'desc')
            ->paginate(10);
    }
    public function render()
    {
        return view('livewire.frontend.profesores.carpetas.pendientes');
    }
}
