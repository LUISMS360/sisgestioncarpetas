<?php

namespace App\Livewire\Frontend\Admin\Memorandos;

use App\Models\Memorandom;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Recibidos extends Component
{
    #[Layout('layouts.admin.app')]
    #[Title('Recibidos')]


    public $nombre;
    public $memorandosTotales; 
    public $pendientes;
    public $revisados;
    public function mount(){
        // $this->memorandosTotales = Memorandom::where('profeso ')->count();
    }
    public function memorandos(){

    }
    public function render()
    {
        return view('livewire.frontend.admin.memorandos.recibidos');
    }
}
