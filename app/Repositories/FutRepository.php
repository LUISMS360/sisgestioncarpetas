<?php

namespace App\Repositories;

use App\Interfaces\FutRepositoryInterface;
use App\Models\Fut;
use App\Models\User;

class FutRepository implements FutRepositoryInterface
{
    public function searchByDni($dni)
    {
        return Fut::where('dni',$dni)->first();
    }
    public function createNew($data)
    {
        $userId = User::where('dni',$data['documento_identidad'])->value('id');
        if($userId===null){
            return 0;
        }
        $data['user_id'] = $userId;
        $fut = Fut::create($data);        
        if(!$fut){
            return 1;
        }
        return $fut;
    }
}
