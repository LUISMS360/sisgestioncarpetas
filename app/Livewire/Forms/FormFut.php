<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\Fut;
use Illuminate\Support\Facades\Auth;

class FormFut extends Form
{
    #[Validate]
    public $resumen_solicitud;

    #[Validate]
    public $datos_del_solicitante;

    #[Validate]
    public $nombres_apellidos;

    #[Validate]
    public $documento_identidad;

    #[Validate]
    public $razon_social;

    #[Validate]
    public $ruc;

    #[Validate]
    public $telefonos;

    #[Validate]
    public $correo;

    #[Validate]
    public $domicilio;

    #[Validate]
    public $cargo_actual;

    #[Validate]
    public $carrera_profesional;

    #[Validate]
    public $anio_egresado;

    #[Validate]
    public $fundamentacion_pedido;

    #[Validate]
    public $documentos_adjuntados;

    #[Validate]
    public $turno;

    #[Validate]
    public $ciclo;

    #[Validate]
    protected $user_id;


    public function rules(): array
    {
        return [
            'resumen_solicitud' => 'required|string|max:255',
            'datos_del_solicitante' => 'required|string|max:255|min:10',
            'nombres_apellidos' => 'required|string|max:255',
            'documento_identidad' => 'required|digits:8',
            'razon_social' => 'nullable|string|max:255',
            'ruc' => 'nullable|string|max:255',
            'telefonos' => 'required|digits:9|starts_with:9',
            'correo' => 'required|email:rfc,dns',
            'domicilio' => 'required|string|max:255',
            'cargo_actual' => 'required|in:egresado,estudiante',
            'carrera_profesional' => 'required|string|in:Desarrollo de Sistemas,Enfermeria,Quimica,Mecanica Automoriz,Contabilidad,Electrotecnia',
            'anio_egresado' => 'nullable|string',
            'fundamentacion_pedido' => 'required|string|max:255',
            'documentos_adjuntados' => 'required|string|max:255',
            'turno' => 'nullable|in:mañana,noche',
            'ciclo' => 'nullable|in:I,II,III,IV,V,VI',
        ];
    }
    public function create()
    {
        $this->validate();
        $data = $this->pull();
        $data['user_id'] = Auth::id();
        Fut::create($data);
    }
    public function delete() {}
}
