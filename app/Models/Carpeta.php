<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Carpeta extends Model
{
    protected $fillable = [
        'usuario_id',
        'profesor_id'
    ];

    
    public function user(): HasOne{
        return $this->hasOne(User::class);
    }

    public function profesor(): HasOne{
        return $this->hasOne(User::class);
    }

    public function hjCriteriosEvCualitativa(): HasOne{
        return $this->hasOne(HjCriteriosEvCualitativa::class);
    }
    
    public function hjAceptacion(): HasOne{
        return $this->hasOne(HjAceptacion::class);
    }

    public function hjEvaluacion():HasOne{
        return $this->hasOne(HjEvaluacion::class);
    }

    public function hjMonitoreo(): HasOne{
        return $this->hasOne(HjMonitoreo::class);
    }

    public function hjResumen(): HasOne{
        return $this->hasOne(HjResumen::class);
    }

    public function hjInforme():HasOne{
        return $this->hasOne(HjInforme::class);
    }
    
}
