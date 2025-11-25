<?php

namespace App\Http\Controllers;

use App\Http\Requests\Carpetas\FormStoreCarpetaValidate;
use App\Http\Requests\Hojas\FormStoreHjAceptacionValidate;
use App\Services\CarpetaService;
use Illuminate\Http\Request;

class CarpetaController extends Controller
{
    protected $carpetaService;

    public function __construct(CarpetaService $carpetaService)
    {
        $this->carpetaService = $carpetaService;
    }

    public function store(FormStoreCarpetaValidate $request){
        $data = $request->validated();
        $carpeta = $this->carpetaService->createNewCarpeta($data);
        if(!$carpeta){
            return response()->json([
                'status'=>'error',
                'response'=> 'Ha ocurrido un error al crear la carpeta'                
            ],400);
        }
        return response()->json([
            'status'=>'success',
            'response'=> 'Carpeta de practicas creada',
            'data'=>$carpeta
        ],201);
    }

    public function show($dni){
        return $this->carpetaService->shearchByDni($dni);
    }

    public function addAceptacionInfo(FormStoreHjAceptacionValidate $request){        
        $data = $request->validated();
        if(!$this->carpetaService->addInfoHjAceptacion($data)){
            return response()->json([
                'status'=>'error',
                'response'=> 'Ha ocurrido un error'                
            ],400);
        }
        return response()->json([
            'status'=>'success',
            'response'=> 'Hoja de Aceptacion Completada'                
        ],201);
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
