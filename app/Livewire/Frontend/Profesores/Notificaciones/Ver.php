<?php

namespace App\Livewire\Frontend\Profesores\Notificaciones;

use App\Models\Notificacion;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Title;
use Livewire\Component;

class Ver extends Component
{
    #[Layout('layouts.profesor.app')]
    #[Title('Ver Notificacion')]
    #[Locked]
    public $id;
    public $titulo; 
    public $contenido;
    public $emisor;

    public $created_at;
    
    public $estado;

    public function mount(){
        $notificacion  = Notificacion::find($this->id);
        $emisor = User::findOrFail($notificacion->emisor_id);
        $this->titulo = $notificacion->titulo;
        $this->contenido = $notificacion->contenido;
        $this->emisor = $emisor->name;
        $this->created_at = $notificacion->created_at;
        $this->estado = $notificacion->estado;
    }
    public function render()
    {
        return view('livewire.frontend.profesores.notificaciones.ver');
    }
}
