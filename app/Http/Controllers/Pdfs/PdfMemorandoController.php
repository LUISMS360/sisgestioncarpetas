<?php

namespace App\Http\Controllers\Pdfs;

use App\Http\Controllers\Controller;
use App\Models\Memorandom;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfMemorandoController extends Controller
{
    public function generarPdf($id){
        $memorando = Memorandom::with("profesor")->findOrFail($id);
        $pdf = Pdf::loadView('complements.pdfs.memorandos.memorando',compact('memorando'));
        $pdf->setPaper('a4', 'portrait');
        return $pdf->stream();
    }
    public function descargarPdf($id){
        $memorando = Memorandom::with("profesor")->findOrFail($id);
        $pdf = Pdf::loadView('complements.pdfs.memorandos.memorando',compact('memorando'));
        $pdf->setPaper('a4', 'portrait');
        return $pdf->download('memorando-'.$memorando->profesor->name.'.pdf');
    }
}

