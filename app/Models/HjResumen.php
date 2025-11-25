<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HjResumen extends Model
{
    protected $table = 'table_hoja_resumen_practicas_preprofesionales';

    protected $fillable = [
        'carpeta_id',
        'nombre_practicante',
        'carrera_profesional',
        'razon_social_emp_inst',
        'denominacion_modulo',
        'horas_minimo',
        'inicio_practicas',
        'fin_practicas',
        'descripcion',
        'firma_jefe_area',
        'firma_docente_evaluador',
    ];

    public function carpeta(): BelongsTo{
        return $this->belongsTo(Carpeta::class);
    }
}
