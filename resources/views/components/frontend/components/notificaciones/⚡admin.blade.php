<?php

use App\Models\Notificacion;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\On; 

new class extends Component
{
    // Usamos una función que Livewire ejecutará en cada renderizado
    public function with()
    {
        return [
            'conteo' => Notificacion::where('estado','pendiente')->where('user_id', Auth::id())->count(),
        ];
    }
};
?>

<div wire:poll.3s>
    <a href="{{ route('admin.notificaciones') }}" wire:navigate class="sidebar-link d-flex align-items-center">
        <div class="position-relative d-inline-block me-3">
            <i class="bi bi-bell fs-3"></i>

            @if($conteo > 0)
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger border border-light"
                    style="font-size: 0.65rem; margin-top: 2px; margin-left: -4px;">
                    {{ $conteo > 9 ? '+9' : $conteo }}
                    <span class="visually-hidden">notificaciones</span>
                </span>
            @endif
        </div>
        <span>Notificaciones</span>
    </a>
</div>