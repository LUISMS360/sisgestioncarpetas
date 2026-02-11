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

     public function eliminar($id)
    {
        $notificacion = Notificacion::where('user_id', Auth::id())->findOrFail($id);
        $notificacion->delete();

        // Dispatch para SweetAlert2 (si lo tienes configurado)
        $this->dispatch('swal', [
            'title' => 'Eliminado',
            'text' => 'La notificación ha sido borrada.',
            'icon' => 'success'
        ]);
    }

    /**
     * Marcar como leída (Opcional si decides añadir la columna después)
     */
    public function leer($id)
    {
        // Aquí podrías redirigir al usuario o abrir un modal
        // Por ahora lo dejamos listo para futuras expansiones
    }
    public function render()
    {
        return view('livewire.frontend.profesores.notificaciones.notificaciones',
        [
            'notificaciones' => Notificacion::where('user_id', Auth::id())
                ->with('emisor') // Eager loading para evitar el problema N+1
                ->latest()       // Ordenar por las más recientes
                ->paginate(10)   // Paginación de 10 en 10
        ]);
    }
}
