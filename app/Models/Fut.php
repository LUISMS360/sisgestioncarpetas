<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fut extends Model
{
    protected $table = 'futs';          

    protected $fillable = [        
        'resumen_solicitud',
        'datos_del_solicitante',
        'nombres_apellidos',
        'documento_identidad',
        'razon_social',
        'ruc',
        'telefonos',
        'correo',
        'domicilio',
        'cargo_actual',
        'carrera_profesional',
        'anio_egresado',
        'fundamentacion_pedido',
        'documentos_adjuntados',
        'fecha',
        'lugar',
        'firma',
        'turno',
        'ciclo',
        'user_id'
    ];
}
