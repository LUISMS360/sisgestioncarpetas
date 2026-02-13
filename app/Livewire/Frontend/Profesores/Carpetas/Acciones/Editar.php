<?php

namespace App\Livewire\Frontend\Profesores\Carpetas\Acciones;

use App\Models\Carpeta;
use App\Models\Notificacion;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Editar extends Component
{
    public $id;

    #[Layout('layouts.profesor.app')]
    #[Title('Editar Carpeta')]

    public $isEditable = false;


    public $carpeta;

    // Campos del Formulario (Estudiante/FUT)
    public $estudiante, $documento, $cargo, $carrera, $telefono, $correo, $turno, $ciclo, $anio_egreso, $resumen;
    public $documentos_adjuntos, $fundamentacion_pedido;
    public $progreso, $fecha, $creacion, $estado;

    //Campos validar

    public $hj_aceptacion_prtc_preprofesional;

    public $hj_monitoreo_prtc_preprofesional;

    public $hj_evaluacion_prtc_preprofesional;

    public $hj_informe_prtc_preprofesional;

    public $hj_resumen_prtc_preprofesional;

    public $nota;

    public $modulo;
    public $nota_letra; 
    public $lugar;

    public $fecha_inicio; 
    public $fecha_fin;
    public function mount($id)
    {
        $this->id = $id;

        // Cargamos la carpeta con sus relaciones
        $this->carpeta = Carpeta::with(['profesor', 'fut'])->findOrFail($id);

        // Mapeo de datos para los inputs
        $fut = $this->carpeta->fut;
        $this->estudiante = $fut->datos_del_solicitante;
        $this->documento = $fut->documento_identidad;
        $this->cargo = $fut->cargo_actual;
        $this->carrera = $fut->carrera_profesional;
        $this->telefono = $fut->telefonos;
        $this->correo = $fut->correo;
        $this->turno = $fut->turno;
        $this->ciclo = $fut->ciclo;
        $this->anio_egreso = $fut->anio_egresado;
        $this->resumen = $fut->resumen_solicitud;
        $this->documentos_adjuntos = $fut->documentos_adjuntados;
        $this->fundamentacion_pedido = $fut->fundamentacion_pedido;

        $this->creacion = $this->carpeta->created_at;
        $this->progreso = $this->carpeta->progreso;
        $this->fecha = $this->carpeta->fecha;
        $this->estado = $this->carpeta->estado;

        $this->hj_aceptacion_prtc_preprofesional = $this->carpeta->hj_aceptacion_prtc_preprofesional;
        $this->hj_monitoreo_prtc_preprofesional = $this->carpeta->hj_monitoreo_prtc_preprofesional;
        $this->hj_evaluacion_prtc_preprofesional = $this->carpeta->hj_evaluacion_prtc_preprofesional;
        $this->hj_informe_prtc_preprofesional = $this->carpeta->hj_informe_prtc_preprofesional;
        $this->hj_resumen_prtc_preprofesional = $this->carpeta->hj_resumen_prtc_preprofesional;
        $this->modulo = $this->carpeta->modulo;
        $this->nota = $this->carpeta->nota;
        $this->nota_letra = $this->carpeta->nota_letra;
        $this->lugar = $this->carpeta->lugar;
        $this->fecha_inicio = $this->carpeta->fecha_inicio;
        $this->fecha_fin = $this->carpeta->fecha_fin;
    }

    public function toggleEdit()
    {
        $this->isEditable = !$this->isEditable;
    }

    public function actualizarHojas()
    {
        $carpeta = Carpeta::findOrFail($this->id);
        $carpeta->update([
            'hj_aceptacion_prtc_preprofesional' => (int) $this->hj_aceptacion_prtc_preprofesional,
            'hj_monitoreo_prtc_preprofesional'  => (int) $this->hj_monitoreo_prtc_preprofesional,
            'hj_evaluacion_prtc_preprofesional' => (int) $this->hj_evaluacion_prtc_preprofesional,
            'hj_informe_prtc_preprofesional'    => (int) $this->hj_informe_prtc_preprofesional,
            'hj_resumen_prtc_preprofesional'    => (int) $this->hj_resumen_prtc_preprofesional,
            'modulo'=>$this->modulo,
            'nota'=>$this->nota,
            'nota_letra'=>$this->nota_letra,
            'lugar'=>$this->lugar,
            'fecha_inicio'=>$this->fecha_inicio,
            'fecha_fin'=>$this->fecha_fin,
        ]);

        $progreso = DB::table('carpetas')
            ->selectRaw('(hj_aceptacion_prtc_preprofesional + hj_monitoreo_prtc_preprofesional + hj_evaluacion_prtc_preprofesional + hj_informe_prtc_preprofesional + hj_resumen_prtc_preprofesional) * 20 as progreso')
            ->where('id', $this->id)
            ->value('progreso');
        Carpeta::where('id', $this->id)->update(['progreso'=>$progreso]);
        $this->progreso = $progreso;
        $this->dispatch('hojas-actualizada');
    }

    public function marcaCompleto(){
        $carpeta = Carpeta::findOrFail($this->id);
        $user = User::findOrFail($this->carpeta->fut->user_id);
        //Estudiante
        Notificacion::create(['user_id'=>$user->id,'titulo'=>'Carpeta Revisada','contenido'=>'Su carpeta con Correspondiente al modulo '.$carpeta->modulo.' ha sido revisada correctamente','emisor_id'=>Auth::id()]);
        //Admin
        Notificacion::create(['user_id'=>$this->carpeta->admin->id,'titulo'=>'Carpeta Supervisada','contenido'=>'Se ha culminado con la supervision de la carpeta '.$carpeta->id,'emisor_id'=>Auth::id()]);
        $carpeta->estado = 'revisado';
        $carpeta->save();
        $this->dispatch('carpeta-completa');

    }
    public function render()
    {
        return view('livewire.frontend.profesores.carpetas.acciones.editar');
    }
}
