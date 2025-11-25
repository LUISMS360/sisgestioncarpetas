<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HjCriteriosEvCualitativa extends Model
{
    protected $table = 'table_hoja_evaluacion_practicas_preprofesionales'; 
    protected $fillable = [
        'carpeta_id',
        'c_uno',
        'c_dos',
        'c_tres',
        'c_cuatro',
        'c_cinco',
        'c_seis',
        'c_siete',
        'c_ocho',
        'c_nueve',
        'c_diez',
        'c_once',
        'c_doce',
        'c_trece',
        'c_catorce',
        'c_diecisies',
        'c_diecisiete',
        'c_dieciocho',
        'c_diecinueve',
        'c_veinte',
        'semantica',
        'numerico',
        'literal',
        'firma_empresa',
        'sello_empresa',
        'c_quince',
    ];

    public function carpeta(): BelongsTo{
        return $this->belongsTo(Carpeta::class);
    }
}
