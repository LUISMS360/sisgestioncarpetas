<?php

namespace App\Interfaces;

interface UserRepositoryInterface
{
    //Metodo de interfaz para poder buscar un usuario por ID
    public function shearchById($id);

    //Meotodo de interfaz para poder obtener todos los usuarios
    public function getAll();

    //Meotodo de interfaz para poder crear un nuebo usuario
    public function createNew($data);

    public function login($data);
}
