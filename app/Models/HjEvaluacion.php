<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HjEvaluacion extends Model
{
    protected $table = 'table_hoja_evaluacion_practicas_preprofesionales';

    protected $fillable = [
        'carpeta_id',
        'fecha',
        'estudiante',
        'carrera',
        'modulo',
        'periodo_evaluacion',
        'razon_social_empresa',
        'direcion',
        'telefono',
        'supervisor',
        'cargo',
        'lugar',
        'periodo_inicio',
        'periodo_final',
        'total_horas',
        'tareas_asignadas'
    ];

    public function carpeta(): BelongsTo{
        return $this->belongsTo(Carpeta::class);
    }
}
