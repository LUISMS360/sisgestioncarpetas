<?php

namespace App\Livewire\Frontend\Admin\Notificaciones;

use App\Models\Notificacion;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;
use Mockery\Matcher\Not;

class Notificaciones extends Component
{
    use WithPagination;

    // Propiedad para controlar la cantidad de carga
    public $perPage = 10;

    #[Layout('layouts.admin.app')]
    #[Title('Notificaciones')]

    /**
     * Incrementa la cantidad de registros a mostrar
     */
    public function loadMore()
    {
        $this->perPage += 10;
    }

    public function eliminar($id)
    {
       Notificacion::findOrfail($id)->delete();
        $this->dispatch('notificacion-eliminada');
    }

    public function marcarLeido($id)
    {
        Notificacion::findOrfail($id);
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

        return view('livewire.frontend.admin.notificaciones.notificaciones', [
            'notificaciones' => $query->paginate($this->perPage),
            // Aquí definimos la variable que te falta:
            'totalNotificaciones' => Notificacion::where('user_id', Auth::id())
                ->count()
        ]);
    }
}
