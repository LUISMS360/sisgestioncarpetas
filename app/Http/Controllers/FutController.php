<?php

namespace App\Http\Controllers;

use App\Http\Requests\Futs\FormStoreFutValidate;
use App\Http\Requests\StoreFutValidate;
use App\Models\Fut;
use App\Services\FutService;
use Illuminate\Http\Request;

class FutController extends Controller
{
    protected $futService;
    public function __construct(FutService $futService)
    {
        $this->futService  = $futService;
    }

    public function show(Request $request){
        $fut = $this->futService->searchFutByID($request->input('dni'));
        if(!$fut){
            return response()->json(['status'=>'error','response'=>'No hay fut asociado al dni'],404);
        }        
        return response()->json(['status'=>'success','response'=>'Fut encontrado','data'=>$fut],200);
    }
    public function store(FormStoreFutValidate $request){
        $data = $request->validated();
        $fut = $this->futService->createNewFut($data);
        if($fut===0){
            return response()->json(['status'=>'error','response'=>'El usuario no existe!'],400);
        }
        if($fut===1){
            return response()->json(['status'=>'error','response'=>'Ha ocurrido un error al crear al fut!'],400);
        }        
        return response()->json(['status'=>'success','response'=>'Se ha creado el fut exitosamente','data'=>$data],201);
    }
}
