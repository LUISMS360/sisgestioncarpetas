<?php

namespace App\Livewire\Frontend\Profesores\Memorandos;

use App\Models\Memorandom;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;

class Recibidos extends Component
{
    #[Layout('layouts.profesor.app')]
    #[Title('Memos Recibidos')]

    #[Url]
    public $modulo;

    #[Url]
    public $mes;

    #[Url]
    public $anio;

    public $selectedMemo = null;

    public $memorandos;
    public $memo_primer_ciclo;
    public $memo_segundo_ciclo;
    public $memo_tercer_ciclo;
    public function mount(){
        $this->memorandos = Memorandom::where('profesor_id',Auth::id())->count();
        $this->memo_primer_ciclo = Memorandom::where('modulo','I')->where('profesor_id',Auth::id())->count();
        $this->memo_segundo_ciclo = Memorandom::where('modulo','II')->where('profesor_id',Auth::id())->count();
        $this->memo_tercer_ciclo = Memorandom::where('modulo','III')->where('profesor_id',Auth::id())->count();
    }
    #[Computed]
    public function recibidos(){
        return DB::table('memorandus as m')
            ->join('users as p', 'p.id', '=', 'm.profesor_id')
            ->select('m.id as id', 'p.name as profesor', 'p.email as correo', 'm.asunto as asunto', 'm.created_at as fecha_emision', 'm.modulo as modulo')
            ->where('profesor_id',Auth::id())
            ->when($this->modulo, function ($q) {
                $q->where('m.modulo', $this->modulo);
            })
            ->when($this->mes, function ($q) {
                $q->whereMonth('m.created_at', $this->mes);
            })
            ->when($this->anio, function ($q) {
                $q->whereYear('m.created_at', $this->anio);
            })
            ->orderBy('m.id','desc')
            ->paginate(10);
    }

    public function verAsunto($id)
    {
        // Buscamos directamente en la tabla por ID
        $this->selectedMemo = DB::table('memorandus as m')
            ->join('users as p', 'p.id', '=', 'm.profesor_id')
            ->select('m.id', 'p.name as profesor', 'm.asunto as asunto', 'm.created_at')
            ->where('m.id', $id)
            ->first();
    }
    public function render()
    {
        return view('livewire.frontend.profesores.memorandos.recibidos');
    }
}
