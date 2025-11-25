<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HjInforme extends Model
{
    protected $table = 'table_informe_practica_preprofesional';
    protected $fillable = [
        'carpeta_id',
        'nombre_practicante',
        'carrera_profesional',
        'modulo_tecnico',
        'razon_social',
        'actividad_emp_inst',
        'lugar_practica',
        'inicio_practica',
        'termino',
        'horas_acumuladas',
        'nombres_jefe',
        'cargo',
        'organizacion_practicas_emp_inst',
        'metodos_tecnicas_inst',
        'secuencia_tareas',
        'logros_alcanzados',
        'dificultades_presentadas',
        'alternativas_solucion',
        'bibliografia',
        'recomendaciones',
        'firma_responsable',
        'firma_practicante',
    ];

    public function carpeta(): BelongsTo{
        return $this->belongsTo(Carpeta::class);
    }
}
