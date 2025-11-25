<?php

namespace App\Services;

use App\Repositories\CarpetaRepository;

class CarpetaService
{
    protected $carpetaRepository;

    public function __construct(CarpetaRepository $carpetaRepository)
    {
        $this->carpetaRepository = $carpetaRepository;
    }

    public function createNewCarpeta($data){
        return $this->carpetaRepository->createNew($data);
    }

    public function shearchByDni($dni){
        return $this->carpetaRepository->searchByUser($dni);
    }

    public function addInfoHjAceptacion($data){
        return $this->carpetaRepository->addHjAceptcion($data);
    }
    public function addInfoHjCriteriosEvCualitativa($data){
        return $this->carpetaRepository->addCriteriosEvCualitativa($data);
    }
    public function addInfoHjEvaluacion($data){
        return $this->carpetaRepository->addHjEvaluacion($data);
    }
    public function addInfoEvaluacion($data){
        return $this->carpetaRepository->addHjEvaluacion($data);
    }
    public function addInfoHjInforme($data){
        return $this->carpetaRepository->addHjInforme($data);
    }
    public function addInfoMonitoreo($data){
        return $this->carpetaRepository->addMonitoreo($data);
    }
    public function addInfoResumen($data){
        return $this->carpetaRepository->addHjInforme($data);
    }
}

