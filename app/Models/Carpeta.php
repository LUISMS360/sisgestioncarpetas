<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Carpeta extends Model
{
    use HasFactory;
    protected $table = 'carpetas';
    protected $fillable = [
        'profesor_id',
        'fut_id',
        'admin_id',   
        'fecha' ,
        'hj_aceptacion_prtc_preprofesional',
        'hj_monitoreo_prtc_preprofesional',
        'hj_evaluacion_prtc_preprofesional',
        'hj_informe_prtc_preprofesional',
        'hj_resumen_prtc_preprofesional',
        'estado',
        'modulo',
        'nota',
        'nota_letra', 
        'lugar',
        'fecha_inicio',
        'fecha_fin',
    ];

    

    public function admin(): BelongsTo{
        return $this->belongsTo(User::class,'admin_id','id');
    }
    public function profesor():BelongsTo{
        return $this->belongsTo(User::class,'profesor_id','id');
    }
    public function fut():BelongsTo{
        return $this->belongsTo(Fut::class);
    }

    
}
