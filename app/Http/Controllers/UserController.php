<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\FormStoreUserValidate;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;    
    }

    public function index(){
        $data = $this->userService->getAllUsers();
        return response()->json([
            'status'=>'succes',
            'data'=>$data
        ],200);
    }
    public function show($id){
        $data = $this->userService->showhByIdUser($id);
        return response()->json([
            'status'=>'success',
            'data'=>$data
        ],200);
    }
    public function store(FormStoreUserValidate $request){
        $data = $request->validated();        
        $user = $this->userService->createNewUser($data);
        if(!$user){
            return response()->json([
                'status'=>'error',
                'response'=>'Ha ocurrido un error al crear al usuario!'
            ],400);
        }
        return response()->json([
            'status'=>'success',
            'response'=>'Se ha creado el usuario existosamente!',
            'data'=>$user
        ],201);        
    }

    public function verify(Request $data){
        $user = $this->userService->loguarUser($data);
        if(!$user){
            return response()->json([
                'status'=>'error',
                'response'=>'Error! usuario o contraseña incorrectos!'                
            ],400);
        }
        return response()->json([
            'status'=>'success',
            'response'=>'Usuario Autenticado exitosamente!',
            'data'=>$user
        ]);
    }
}
