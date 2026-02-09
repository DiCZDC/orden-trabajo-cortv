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
        // session()->put('ultima_orden',[
        //     'nombre' => $empleado->trabajador->nombre,
        //     'cargo' => $empleado->cargo,
        //     'contrato' => true,
        //     'area' => 'TV',
        //     'hora_inicio' => $empleado->hora_entrada,
        //     'hora_fin' => $empleado->hora_salida,
        //     'fecha_solicitud' => $orden->fecha_solicitud->format('Y-m-d'),
        //     'fecha_llamado' => $orden->fecha_cita->format('Y-m-d'),
        //     'hora_llamado' => $orden->hora_llamado,
        //     'lugar_cita' => $orden->lugar_cita,
        //     'locacion' => 'Ciudad',
        //     'actividades' => $orden->actividad,
        //     'asistente' => 'Carlos Gomez',
        //     'director_proyecto' => 'PENDEJO DANIEL',
        //     'nombre_proyecto' => $orden->proyecto->nombre,
        //     'hora_catering' => $orden->hora_catering,
        //     'hora_reinicio' => $orden->hora_reinicio,
        //     'hora_ultimo_tiro' => $orden->hora_ultimo_tiro,
        //     'observaciones' => $orden->observaciones,
            
        //     'operaciones_nombre' => 'ING. EDWIN MARTÍNEZ CRUZ',
        //     'productor' => $orden->proyecto->productor->trabajador->nombre,
        //     'director' => 'LIC. DIANA ISIS MOLINA DOMINGUEZ',
        // ]);

        $pdf = Pdf::loadView('pdf.orden');
        return $pdf->stream('orden.pdf');
    }
}
