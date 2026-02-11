<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Fut extends Model
{
    protected $table = 'futs';          

    protected $fillable = [        
        'resumen_solicitud',
        'dirigida',
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
    protected $attributes = [
        'dirigida'=>'ISTP Manuel Seoane Corrales',
        'lugar'=>'Lima Peru, San Juan de Lurigancho'
    ];

    public function carpeta(): HasOne{
        return $this->hasOne(Carpeta::class);
    }
}
