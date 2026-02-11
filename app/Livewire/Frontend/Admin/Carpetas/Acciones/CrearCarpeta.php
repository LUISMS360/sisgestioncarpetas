<?php

namespace App\Livewire\Frontend\Admin\Carpetas\Acciones;

use App\Models\Carpeta;
use App\Models\Fut;
use App\Models\Notificacion;
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
    public $selectedFut;
    public $selectedAdmin;

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
    public function carpetasEstudiantes()
    {
        return DB::table('carpetas as c')
            ->join('futs as f', 'f.id', '=', 'c.fut_id')
            ->join('users as u', 'u.id', '=', 'f.user_id')
            ->where('f.cargo_actual', 'estudiante')
            ->count();
    }
    #[Computed]
    public function carpetasEgresados()
    {
        return DB::table('carpetas as c')
            ->join('futs as f', 'f.id', '=', 'c.fut_id')
            ->join('users as u', 'u.id', '=', 'f.user_id')
            ->where('f.cargo_actual', 'egresado')
            ->count();
    }
    public function carpetasTotales()
    {
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
            )->orderBy('id','desc')
            ->paginate(8);
    }

    #[Computed]
    public function profesores()
    {
        return User::where('rol', 'profesor')->select('id', 'name', 'email', 'rol')->get();
    }

    public function agregarCarpeta($futId)
    {
        $fut = Fut::find($futId);
        if (!$fut) {
            $this->dispatch('fut-no-encontrado');
            return;
        }
        if ($fut->estado == 'revisado') {
            $this->dispatch('fut-revisado');
            return;
        }
        if (!$this->profesor) {
            $this->dispatch('profesor-vacio');
            return;
        }

        $this->selectedFut = $futId;
        $this->selectedAdmin = Auth::id();

        $this->dispatch('abrir-modal-fecha');
    }

    #[On('confirmarCreacion')]
    public function crearCarpeta($data)
    {
        // Validar que la fecha venga en el evento
        if (!isset($data['fecha'])) return;

        Carpeta::create([
            'profesor_id' => $this->profesor,
            'fut_id'      => $this->selectedFut,
            'admin_id'    => $this->selectedAdmin,
            'fecha'       => $data['fecha']
        ]);

        Fut::where('id', $this->selectedFut)->update(['estado' => 'revisado']);

        //Notificacion para el profesor        
        Notificacion::create(['user_id'=>$this->profesor,'titulo'=>'Carpeta asignada',
        'contenido'=>'Se le ha asignado una carpeta a supervisar con limite hasta'.$data['fecha'],
        'emisor_id'=>auth()->user()->id]);

        $fut = Fut::findOrFail($this->selectedFut);
        $user = User::findOrFail($fut->user_id);

        //Notificacion para el estudiante
        Notificacion::create(['user_id'=>$user->id,'titulo'=>'Carpeta en revision', 
        'contenido'=>'Su carpeta estara en revision hasta '.$data['fecha'],'emisor_id'=>auth()->user()->id]);

        $this->dispatch('carpeta-creada');
        $this->reset(['profesor', 'selectedFut', 'selectedAdmin', 'fecha']);
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
