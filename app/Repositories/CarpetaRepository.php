<?php

namespace App\Repositories;

use App\Interfaces\CarpetaRepositoryInterface;
use App\Models\Carpeta;
use App\Models\HjAceptacion;

class CarpetaRepository implements CarpetaRepositoryInterface
{
    public function createNew($data)
    {
        $carpeta = Carpeta::create($data);
        if(!$carpeta){
            return false;
        }
        $carpetaCreated = Carpeta::with(['user','profesor'])->findOrFail($carpeta->id);
        return $carpetaCreated;
    }

    public function searchByUser($dni)
    {
        throw new \Exception('Not implemented');
    }

    public function addHjAceptcion($data)
    {
        if(!HjAceptacion::create($data)){
            return false;
        }
        return true;
        
    }

    public function addCriteriosEvCualitativa($data)
    {
        throw new \Exception('Not implemented');
    }

    public function addHjEvaluacion($data)
    {
        throw new \Exception('Not implemented');
    }

    public function addHjInforme($data)
    {
        throw new \Exception('Not implemented');
    }

    public function addMonitoreo($data)
    {
        throw new \Exception('Not implemented');
    }
    
    public function addHjResumen($data)
    {
        throw new \Exception('Not implemented');
    }    

}
