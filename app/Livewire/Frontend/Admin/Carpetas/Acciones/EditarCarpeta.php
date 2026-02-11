<?php

namespace App\Livewire\Frontend\Admin\Carpetas\Acciones;

use App\Models\Carpeta;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;

class EditarCarpeta extends Component
{
    #[Layout('layouts.admin.app')]
    #[Title('Editar Carpeta')]

    public $id;
    public $isEditable = false;

    // Propiedades de la Carpeta y Relaciones
    public $carpeta; 
    public $profesor;

    // Campos del Formulario (Estudiante/FUT)
    public $estudiante, $documento, $cargo, $carrera, $telefono, $correo, $turno, $ciclo, $anio_egreso, $resumen;
    public $documentos_adjuntos, $fundamentacion_pedido;
    public $progreso, $fecha, $creacion, $estado;

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
        
        // Datos del profesor y carpeta
        $this->profesor = $this->carpeta->profesor; // Livewire intentará serializar este modelo
        $this->creacion = $this->carpeta->created_at;
        $this->progreso = $this->carpeta->progreso;
        $this->fecha = $this->carpeta->fecha;
        $this->estado = $this->carpeta->estado;
    }

    public function toggleEdit()
    {
        $this->isEditable = !$this->isEditable;
    }

    public function updateFecha(){
        Carpeta::where('id',$this->id)->update(['fecha'=>$this->fecha]);
        $this->dispatch('fecha-actualizada');
    }

    public function marcarCompleto(){
        
    }

    public function render()
    {
        return view('livewire.frontend.admin.carpetas.acciones.editar-carpeta');
    }
}