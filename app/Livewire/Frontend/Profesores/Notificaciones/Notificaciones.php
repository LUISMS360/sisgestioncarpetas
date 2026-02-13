<?php

namespace App\Livewire\Frontend\Profesores\Notificaciones;

use App\Models\Notificacion;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Notificaciones extends Component
{
    #[Layout('layouts.profesor.app')]
    #[Title('Notificaciones')]

    public $perPage = 10;

    /**
     * Incrementa la cantidad de registros a mostrar
     */
    public function loadMore()
    {
        $this->perPage += 10;
    }

    public function eliminar($id)
    {
        Notificacion::findOrFail($id)->delete();
        $this->dispatch('notificacion-eliminada');
    }

    public function marcarLeido($id)
    {
        Notificacion::where('id', $id)->where('user_id', Auth::id())->update(['estado' => 'leido']);
        $this->dispatch('notificacion-leida');
    }

    public function marcarLeidos()
    {
        Notificacion::where('user_id', Auth::id())->update(['estado' => 'leido']);
        $this->dispatch('notificaciones-leidas');
    }
    public function render()
    {
        $query = Notificacion::where('user_id', Auth::id())
            ->with('emisor')
            ->latest();
        return view(
            'livewire.frontend.profesores.notificaciones.notificaciones',
            [
                'notificaciones' => $query->paginate($this->perPage),
                // Aquí definimos la variable que te falta:
                'totalNotificaciones' => Notificacion::where('user_id', Auth::id())
                    ->count()
            ]
        );
    }
}
