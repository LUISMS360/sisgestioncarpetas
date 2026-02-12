<?php

namespace App\Http\Controllers\Pdfs;

use App\Http\Controllers\Controller;
use App\Models\Carpeta;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PdfActaController extends Controller
{
    public function generarPdf($id){
        $carpeta = Carpeta::with("fut")->findOrFail($id);
        $pdf = Pdf::loadView('complements.pdfs.carpetas.acta',compact('carpeta'));
        $pdf->setPaper('a4', 'portrait');
        return $pdf->stream();
    }
    public function descargarPdf($id){
        $carpeta = Carpeta::with("fut")->findOrFail($id);
        $pdf = Pdf::loadView('complements.pdfs.carpetas.acta',compact('carpeta'));
        $pdf->setPaper('a4', 'portrait');
        return $pdf->download('acta-carpeta-'.$carpeta->fut->datos_del_solicitante.'.pdf');
    }
}
