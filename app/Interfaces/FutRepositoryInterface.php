<?php

namespace App\Interfaces;

interface FutRepositoryInterface
{
    public function searchByDni($dni);
    public function createNew($data);
}
