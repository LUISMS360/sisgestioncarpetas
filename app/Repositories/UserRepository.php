<?php

namespace App\Repositories;

use App\Interfaces\UserRepositoryInterface;
use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    //Implementacion  de interfaz, metodo que usa Eloquent Para buscar un usuario en la BD
    public function shearchById($id)
    {
        return User::findOrFail($id);
    }

    //Implementacion  de interfaz, metodo que usa Eloquent para obtener todos los usuarios de la BD
    public function getAll()
    {
        return User::all();
    }

    //Implementacion  de interfaz, metodo que  usa Eloquent para crear un nuevo usuario en la BD
    public function createNew($data)
    {
        $user = User::create($data);
        if(!$user){
            return false;
        }
        return $user;
    }
    //Implementacion  de interfaz, metodo que  usa Eloquent para autenticas  un nuevo usuario de la BD
    public function login($data)
    {
        $email = $data['email'];
        $password = $data['password'];

        if(!User::where('email',$email)->exists()){
            return false;
        }
        $passwordHash = User::where('email',$email)->value('password');
        if(!password_verify($password,$passwordHash)){
            return false;
        }
        $user = User::select('name','email','rol')->where('email',$email)->first();
        return $user;
        
    }
}
