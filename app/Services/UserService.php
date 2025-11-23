<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Hash;

class UserService
{
    protected $user;
    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    public function showhByIdUser($id){
        //Aqui aplicaremos logica de negocio en un futuro
        return $this->user->shearchById($id);
    }
    public function getAllUsers(){
        //Aqui aplicaremos logica de negocio en un futuro
        return $this->user->getAll();
    }
    public function createNewUser($data){
        //Aqui aplicaremos logica de negocio en un futuro
        $data['password'] = Hash::make($data['password']); //Encriptacion de contraseña
        return  $this->user->createNew($data);
        
    }
    public function loguarUser($data){
        return $this->user->login($data);
    }
}
