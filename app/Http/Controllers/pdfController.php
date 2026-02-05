<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
class pdfController extends Controller
{
    public function generatePDF()
    {
        $pdf = Pdf::loadView('pdf.orden', [
            'nombre' => 'Juan Perez',
            'cargo' => 'Tecnico',
            'contrato' => true,
            'area' => 'TV',
            'hora_inicio' => '08:00',
            'hora_fin' => '17:00',
            'fecha_solicitud' => '2024-06-15',
            'fecha_llamado' => '2024-06-16',
            'hora_llamado' => '09:00',
            'lugar_cita' => 'Oficina Central',
            'locacion' => 'Ciudad',
            'actividades' => 'Mantenimiento de equipos',
            'nombre_proyecto' => 'Proyecto X',
            'productor' => 'Maria Lopez',
            'director' => 'Luis Martinez',
            'asistente' => 'Carlos Gomez',
            'hora_catering' => '12:00',
            'hora_reinicio' => '13:00',
            'hora_ultimo_tiro' => '16:30',
            'observaciones' => 'Ninguna',
            'operaciones_nombre' => 'Ana Torres',
        ]);
        return $pdf->stream('orden.pdf');
    }
}
