<?php

namespace App\Livewire\Forms;

use App\Models\Carpeta;
use Livewire\Attributes\Validate;
use Livewire\Form;

class FormCrearCarpeta extends Form
{
    #[Validate]
    public  $profesor;

    #[Validate]
    public $fut;

    #[Validate]
    public $admin; 

    #[Validate]
    public $fecha;

    public function rules():array{
        return [
            'profesor'=>'required|exists:users,id',
            'fut'=>'required|exists:futs,id',
            'admin'=>'required|exists:users,id',
            'fecha'=>'required|date',
        ];
    }
    public function save(){
        $this->validate();
        Carpeta::create([
            'profesor_id' => $this->profesor,
            'fut_id'      => $this->fut,
            'admin_id'    => $this->admin,
            'fecha'       => $this->fecha,
        ]);
    }
}
