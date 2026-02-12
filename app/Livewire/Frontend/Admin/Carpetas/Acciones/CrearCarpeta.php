<?php

namespace App\Livewire\Frontend\Admin\Carpetas\Acciones;

use App\Models\Carpeta;
use App\Models\Fut;
use App\Models\Memorandom;
use App\Models\Notificacion;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
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

    //Filtros 

    #[Url]
    public $cargo;

    #[Url]
    public $mes;

    #[Url]
    public $turno;

    #[Url]
    public $ciclo;

    #[Url]
    public $anio_egreso;

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
                'datos_del_solicitante as datos',
                'documento_identidad as dni',
                'correo',
                'cargo_actual as cargo',
                'fundamentacion_pedido as fundamentacion',
                'estado',
                'created_at'
            )
            ->when($this->cargo,function (Builder $q) {
                $q->where('cargo_actual', $this->cargo);
            })
            ->when($this->mes,function (Builder $q){
                $q->whereMonth('created_at', $this->mes);
            })
            ->when($this->turno,function (Builder $q) {
                $q->where('turno', $this->turno);
            })
            ->when($this->ciclo,function (Builder $q) {
                $q->where('ciclo', $this->ciclo);
            })
            ->when($this->anio_egreso,function (Builder $q) {
                $q->whereYear('created_at', $this->anio_egreso);
            })
            ->where('estado','recibido')
            ->orderBy('id','desc')
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

        //Modificando el estado del fut asociado
        Fut::where('id', $this->selectedFut)->update(['estado' => 'revisado']);
        $fut = Fut::findOrFail($this->selectedFut);
        $profesor = User::findOrFail($this->profesor);

        //memorando para el profesor
        $memo = Memorandom::create(['profesor_id'=>$profesor->id,'asunto'=>'Supervision de practicas del egresado '.$fut->datos_del_solicitante,
        'modulo'=>$fut->modulo]);

        //Notificacion para el profesor        
        Notificacion::create(['user_id'=>$profesor->id,'titulo'=>'Carpeta asignada',
        'contenido'=>'Se le ha asignado la carpeta del estudiante '.$fut->datos_del_solicitante.' a supervisar con limite hasta '.$data['fecha'],
        'emisor_id'=>auth()->user()->id]);

        Notificacion::create(['user_id'=>$profesor->id,'titulo'=>'Memorandum Emitido',
        'contenido'=>'Se le ha emitido un nuevo memorandom de supervision Nro -'.$memo->id,
        'emisor_id'=>auth()->user()->id]);

        //Notificacion para el estudiante
        Notificacion::create(['user_id'=>$fut->user_id,'titulo'=>'Carpeta en revision', 
        'contenido'=>'Su carpeta estara en revision a cargo de '.$profesor->name.' hasta '.$data['fecha'],'emisor_id'=>auth()->user()->id]);

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
