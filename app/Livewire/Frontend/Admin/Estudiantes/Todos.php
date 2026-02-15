<?php

namespace App\Livewire\Frontend\Admin\Estudiantes;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class Todos extends Component
{
    use WithPagination;
    #[Layout('layouts.admin.app')]
    #[Title('Estudiantes')]

    public $dni; 
    public $ciclo; 
    public $turno;
    public $estudiantes;
    public function mount(){
        $this->estudiantes = User::where('rol','estudiante')->count();
    }
    #[Computed]
    public function estudiantes(){
        return User::where('rol','estudiante')
                    ->when($this->dni,function (Builder $q){
                        $q->whereLike('dni', '%'.$this->dni.'%');
                    })
                    ->when($this->ciclo,function (Builder $q){
                        $q->where('ciclo', $this->ciclo);
                    })
                    ->when($this->turno,function (Builder $q){
                        $q->where('turno',$this->turno);
                    })
                    ->paginate(10);
    }
    public function render()
    {
        return view('livewire.frontend.admin.estudiantes.todos');
    }
}
