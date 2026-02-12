<?php

namespace App\Livewire\Frontend\Admin\Carpetas;

use App\Models\Carpeta;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Gestionadas extends Component
{
    use WithPagination;

    #[Layout('layouts.admin.app')]
    #[Title('Carpetas Gestiondas')]

    public $dni = '';

    #[Url]
    public $anio = '';

    #[Url]
    public $ciclo = '';


    #[Url]
    public $anio_egreso = '';

    #[Url]
    public $turno = '';

    public function  updatedDni()
    {
        $this->resetPage();
    }

    public function updatedAnio()
    {
        $this->resetPage();
    }
    public function updatedCiclo()
    {
        $this->resetPage();
    }
    #[Computed]
    public function egresados()
    {
        return DB::table('carpetas as c')
            ->join('futs as f', 'f.id', '=', 'c.fut_id')
            ->join('users as u', 'u.id', '=', 'f.user_id')
            ->where('f.cargo_actual', 'egresado')
            ->where('c.estado', 'revisado')
            ->count();
    }

    #[Computed]
    public function estudiantes()
    {
        return DB::table('carpetas as c')
            ->join('futs as f', 'f.id', '=', 'c.fut_id')
            ->join('users as u', 'u.id', '=', 'f.user_id')
            ->where('f.cargo_actual', 'estudiante')
            ->where('c.estado', 'revisado')
            ->count();
    }

    #[Computed]
    public function carpetas()
    {
        return DB::table('carpetas as c')
            ->select(
                'c.id as id',
                'f.resumen_solicitud as resumen',
                'f.datos_del_solicitante as datos',
                'f.cargo_actual as cargo', // Asegúrate de anteponer 'f.' si viene de futs
                'f.documento_identidad as dni',
                'f.correo as correo',
                'u.name as supervisor',
                'c.estado as estado',
                'c.progreso as progreso'
            )
            ->join('futs as f', 'f.id', '=', 'c.fut_id')
            ->join('users as u', 'u.id', '=', 'c.profesor_id')
            ->join('users as a', 'a.id', '=', 'c.admin_id')
            ->where('c.estado', 'revisado')
            ->when($this->anio, function ($query) {
                $query->whereYear('c.created_at', $this->anio);
            })->when($this->anio_egreso, function ($query) {
                $query->where('f.anio_egresado', $this->anio_egreso);
            })
            ->when($this->ciclo, function ($query) {
                $query->where('f.ciclo', $this->ciclo);
            })
            ->when($this->turno, function ($query) {
                $query->where('f.turno', $this->turno);
            })
            ->whereLike('f.documento_identidad', '%' . $this->dni . '%')
            ->orderBy('id', 'desc')
            ->paginate(10);
    }


    public function render()
    {
        return view('livewire.frontend.admin.carpetas.gestionadas');
    }
}
