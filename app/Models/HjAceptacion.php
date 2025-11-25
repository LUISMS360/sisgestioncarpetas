<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HjAceptacion extends Model
{
    protected $table = 'table_hoja_aceptacion_practicas_preprofesionales';
    
    protected $fillable = [
        'carpeta_id',
        'fecha',
        'razon_social_empresa',
        'direccion',
        'pais',
        'ciudad',
        'lugar',
        'telefono',
        'encargado_control_practicas',
        'vacantes_otorgadas',
        'nro_practica',
        'carrera_profesional',
        'periodo_inicial',
        'periodo_final',
        'horario',
        'observaciones',
        'pago_por_practicas',
        'movilidad',
        'otros',
        'solo_practicas',
        'compromiso_con_empresa',
        'compromiso_seguro',
        'firma_encargado',
        'firma_empresa',
    ];

    public function carpeta(): BelongsTo{
        return $this->belongsTo(Carpeta::class);
    }
}
