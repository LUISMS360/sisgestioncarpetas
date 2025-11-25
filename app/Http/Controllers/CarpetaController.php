<?php

namespace App\Http\Controllers;

use App\Services\CarpetaService;
use Illuminate\Http\Request;

class CarpetaController extends Controller
{
    protected $carpetaService;

    public function __construct(CarpetaService $carpetaService)
    {
        $this->carpetaService = $carpetaService;
    }

    public function store($data){
        return $this->carpetaService->createNewCarpeta($data);        
    }

    public function show($dni){
        return $this->carpetaService->shearchByDni($dni);
    }

    public function addAceptacionInfo($data){
        return $this->carpetaService->addInfoEvaluacion($data);
    }

    public function addCriteriosEvCinfo($data){
        return $this->carpetaService->addInfoHjCriteriosEvCualitativa($data);
    }

    public function addEvaluacionInfo($data){
        return $this->carpetaService->addInfoEvaluacion($data);
    }

    public function addInformeInfo($data){
        return $this->carpetaService->addInfoEvaluacion($data);
    }

    public function addMonitoreoInfo($data){
        return $this->carpetaService->addInfoMonitoreo($data);
    }

    public function addResumenInfo($data){
        return $this->carpetaService->addInfoResumen($data);
    }
}
