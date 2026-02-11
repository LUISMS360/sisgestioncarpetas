<?php

namespace App\Livewire\Frontend\Admin\Carpetas;

use App\Models\Carpeta;
use App\Models\Fut;
use App\Models\Notificacion;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;

class Pendientes extends Component
{
    use WithPagination;

    #[Layout('layouts.admin.app')]
    #[Title('Carpetas Pendientes')]

    public $dni = '';

    #[Url]
    public $anio = '';

    #[Url]
    public $ciclo = '';
    
    #[Url]
    public $anio_egreso= '';

    #[Url]
    public $turno='';
    public $profesor_id_seleccionado;
    public $profesor_nombre;
    public $asunto;
    public $mensaje;

    public $carpeta;

    #[Computed]
    public function egresados()
    {
        return DB::table('carpetas as c')
            ->join('futs as f', 'f.id', '=', 'c.fut_id')
            ->join('users as u', 'u.id', '=', 'f.user_id')
            ->where('f.cargo_actual', 'egresado')
            ->where('c.estado', 'pendiente')
            ->count();
    }

    #[Computed]
    public function estudiantes()
    {
        return DB::table('carpetas as c')
            ->join('futs as f', 'f.id', '=', 'c.fut_id')
            ->join('users as u', 'u.id', '=', 'f.user_id')
            ->where('f.cargo_actual', 'estudiante')
            ->where('c.estado', 'pendiente')
            ->count();
    }

    #[Computed]
    public function otros()
    {
        return Fut::where('cargo_actual', 'otros')->count();
    }

    public function updatedAnio()
    {
        $this->resetPage();
    }
    public function updatedCiclo()
    {
        $this->resetPage();
    }
    public function updatedDni()
    {
        $this->resetPage();
    }

    #[Computed]
    public function carpetas()
    {
        return DB::table('carpetas as c')
            ->select(
                'c.id as id',
                'f.resumen_solicitud as resumen',
                'f.datos_del_solicitante as datos',
                'f.cargo_actual as cargo',
                'f.documento_identidad as dni',
                'f.correo as correo',
                'u.name as supervisor',
                'c.estado as estado',
                'c.progreso as progreso',
                'c.profesor_id',
                'c.created_at'
            )
            ->join('futs as f', 'f.id', '=', 'c.fut_id')
            ->join('users as u', 'u.id', '=', 'c.profesor_id')
            ->where('c.estado', 'pendiente')
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
            ->when($this->dni, function ($query) {
                $query->where('f.documento_identidad', 'like', '%' . $this->dni . '%');
            })
            ->orderBy('c.id', 'desc')
            ->paginate(10);
    }

    public function prepararMensaje($profesorId,$carpeta)
    {
        $this->reset(['asunto', 'mensaje']); // Limpiar campos previos
        $this->profesor_id_seleccionado = $profesorId;
        $this->carpeta = $carpeta;
        // Obtenemos el nombre para mostrarlo en el modal
        $profesor = User::find($profesorId);
        $this->profesor_nombre = $profesor ? $profesor->name : 'Profesor';
    }

    public function enviarMensaje()
    {
        $this->validate([
            'asunto' => 'required|min:5',
            'mensaje' => 'required|min:10',
        ]);

        Notificacion::create(['user_id'=>$this->profesor_id_seleccionado,'titulo'=>$this->asunto.' '.$this->carpeta,
        'contenido'=>$this->mensaje,'emisor_id'=>Auth::id()]);

        // Notificar al usuario (opcional, usando SweetAlert o evento)
        $this->dispatch('closeModal'); // Para cerrar el modal vía JS
    }
    public function deleteCarpeta($id)
    {
        Carpeta::findOrFail($id);
        $this->dispatch('confirm-delete-carpeta', id: $id);
    }

    #[On('delete-carpeta')]
    public function confirmDeleteCarpeta($id)
    {
        Carpeta::findOrFail($id)->delete();
        $this->dispatch('carpeta-eliminada', id: $id);
    }
    public function render()
    {
        return view('livewire.frontend.admin.carpetas.pendientes');
    }
}
