<?php

namespace App\Livewire\Frontend\Admin\Carpetas\Acciones;

use App\Models\Carpeta;
use App\Models\Fut;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class CrearCarpeta extends Component
{
    use WithPagination;

    #[Layout('layouts.admin.app')]
    #[Title('Crear Carpeta')]

    #[Url(as: 'q', history: true)]
    public $dni = "";

    public $profesor;

    public $fecha;

    
    public function updatedDni()
    {
        $this->resetPage();
    }
    #[Computed]
    public function carpetasUltimoMes()
    {
        return DB::table('carpetas')
            ->where('created_at', '>=', now()->subMonth())
            ->count();
    }

    #[Computed]
    public function carpetasEstudiantes(){
        return DB::table('carpetas as c')
                ->join('futs as f','f.id','=','c.fut_id')
                ->join('users as u','u.id','=','f.user_id')
                ->where('f.cargo_actual','estudiante')
                ->count();
    }
     #[Computed]
    public function carpetasEgresados(){
        return DB::table('carpetas as c')
                ->join('futs as f','f.id','=','c.fut_id')
                ->join('users as u','u.id','=','f.user_id')
                ->where('f.cargo_actual','egresado')
                ->count();
    }
    public function carpetasTotales(){
        return DB::table('carpetas')->count();
    }
    #[Computed]
    public function futs()
    {
        return Fut::whereLike('documento_identidad', '%' . $this->dni . '%')
            ->select(
                'id',
                'resumen_solicitud as resumen',
                'datos_del_solicitante as datos',
                'documento_identidad as dni',
                'correo',
                'cargo_actual as cargo',
                'estado',
                'fecha'
            )->paginate(8);
    }

    #[Computed]
    public function profesores()
    {
        return User::where('rol', 'profesor')->select('id', 'name', 'email', 'rol')->get();
    }

    public function agregarCarpeta($fut)
    {
        if (Fut::where('id', $fut)->value('estado') == 'revisado') {
            $this->dispatch('fut-revisado');
            return;
        }
        if (!Fut::where('id', $fut)->exists()) {
            $this->dispatch('fut-no-encontrado');
            return;
        }
        if (!$this->profesor) {
            $this->dispatch('profesor-vacio');
            return;
        }
        $admin = Auth::user()->id;
        $this->dispatch('agregarCarpeta');
        
    }

    #[On('crearCarpeta')]
    public function crearCarpeta(){
        Carpeta::create(['profesor_id' => $this->profesor, 'fut_id' => $fut, 'admin_id' => $admin,'fecha'=>$event.fecha]);
        Fut::where('id', $fut)->update(['estado' => 'revisado']);
        $this->dispatch('carpeta-creada');
        $this->reset(['profesor']);
    }

    public function designarProfesor($id)
    {
        $profesor = User::find($id);
        if (!$profesor) {
            $this->dispatch('profesor-no-encontrado');
            return;
        }
        $this->profesor = $profesor->id;
        $this->dispatch('profesor-designado', name: $profesor->name);
    }

    public function confimarEliminacion($fut)
    {
        $this->dispatch('confirmar-eliminacion-fut', id: $fut);
    }

    #[On('eliminar-fut')]
    public function eliminarFut($id)
    {
        Fut::findOrFail($id)->delete();
        $this->dispatch('fut-eliminado', id: $id);
    }
    public function render()
    {
        return view('livewire.frontend.admin.carpetas.acciones.crear-carpeta');
    }
}
