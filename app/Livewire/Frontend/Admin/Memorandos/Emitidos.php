<?php

namespace App\Livewire\Frontend\Admin\Memorandos;

use App\Models\Memorandom;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;

class Emitidos extends Component
{
    #[Layout('layouts.admin.app')]
    #[Title('Memos Emitidos')]

    #[Url]
    public $nombre;

    #[Url]
    public $profesor;

    #[Url]
    public $modulo;
    #[Url]
    public $mes;

    #[Url]
    public $anio;

    public $selectedMemo = null;

     public $memorandos;
    public $memos_primer_ciclo;
    public $memos_segundo_ciclo;
    public $memos_tercer_ciclo;

    public function mount(){
        $this->memorandos = Memorandom::count();
        $this->memos_primer_ciclo = Memorandom::where('modulo','I')->count();
        $this->memos_segundo_ciclo = Memorandom::where('modulo','II')->count();
        $this->memos_tercer_ciclo = Memorandom::where('modulo','III')->count();
    }

    #[Computed]
    public function emitidos()
    {
        return DB::table('memorandus as m')
            ->join('users as p', 'p.id', '=', 'm.profesor_id')
            ->select('m.id', 'p.name as profesor', 'p.email as correo', 'm.asunto as asunto', 'm.created_at as fecha_emision', 'm.modulo as modulo')
            ->when($this->nombre, function ($q) {
                $q->whereLike('p.name', '%' . $this->nombre . '%');
            })
            ->when($this->profesor, function ($q) {
                $q->where('p.name', $this->profesor);
            })
            ->when($this->modulo, function ($q) {
                $q->where('m.modulo', $this->modulo);
            })
            ->when($this->mes, function ($q) {
                $q->whereMonth('m.created_at', $this->mes);
            })
            ->when($this->anio, function ($q) {
                $q->whereYear('m.created_at', $this->anio);
            })
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
        return view('livewire.frontend.admin.memorandos.emitidos');
    }
}
