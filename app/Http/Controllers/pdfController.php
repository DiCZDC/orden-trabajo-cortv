<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\{
    Orden,
    Empleado
    };
class pdfController extends Controller
{
    public function generatePDF()
    {
        $pdf = Pdf::loadView('pdf.orden')
            ->setPaper('letter', 'portrait');

        return $pdf->stream('orden.pdf');
    }
}
