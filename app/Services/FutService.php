<?php

namespace App\Services;

use App\Repositories\FutRepository;

class FutService
{
    protected $futRepository;

    public function __construct(FutRepository $futRepository)
    {
        $this->futRepository  = $futRepository;
    }

    public function searchFutByID($dni){
        $fut = $this->futRepository->searchByDni($dni);
        if($fut===null){
            return false;
        }
        return $fut;
    }
    public function createNewFut($data){
        return $this->futRepository->createNew($data);
    }
}
