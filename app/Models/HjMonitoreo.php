<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HjMonitoreo extends Model
{
    protected $table = 'table_hoja_monitoreo_practicas_preprofesionales';

    protected $fillable = [
        'carpeta_id',
        'fecha',
        'nombre_practicante',
        'carrera_profesional',
        'modulo_tecnico',
        'centro_practicas',
        'fecha_practica',
        'hora_inicio',
        'hora_termino',
        'nombre_docente',
        'nro_vista',
        'fecha_supervision',
        'tareas_actividades',
        'avance',
        'observacion',
        'dificultades_practica',
        'sugerencias_recomendaciones',
        'firma_docente',
        'firma_practicante',
    ];

    public function carpeta(): BelongsTo{
        return $this->belongsTo(Carpeta::class);
    }
}
