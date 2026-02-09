<?php

use Livewire\Component;
use App\Models\{
    Proyecto,
    Orden,
    Trabajador,
    Empleado
    };
use Livewire\Attributes\Computed;
use App\Http\Controllers\pdfController;
new class extends Component
{
    public $orden_id;
    
    public function mount($orden_id)
    {
        $this->orden_id = $orden_id;
    }
    public function generatePDF()
    {
        session()->put('ultima_orden',[
            'nombre' => $this->empleado()->trabajador->nombre,
            'cargo' => $this->empleado()->cargo,
            'contrato' => true,
            'area' => 'TV',
            'hora_inicio' => $this->orden()->hora_entrada,
            'hora_fin' => $this->orden()->hora_salida,
            'fecha_solicitud' => '2024-06-15',
            'fecha_llamado' => '2024-06-16',
            'hora_llamado' => '09:00',
            'lugar_cita' => 'Oficina Central',
            'locacion' => 'Ciudad',
            'actividades' => 'Mantenimiento de equipos',
            'asistente' => 'Carlos Gomez',
            'nombre_proyecto' => 'Proyecto X',
            'hora_catering' => '12:00',
            'hora_reinicio' => '13:00',
            'hora_ultimo_tiro' => '16:30',
            'observaciones' => 'Ninguna',
            
            'operaciones_nombre' => 'Ana Torres',
            'productor' => $this->orden()->proyecto->productor->trabajador->nombre,
            'director' => 'Luis Martinez',
        ]);
        return redirect()->route('ordenes.pdf');
        
    }
    #[Computed()]
    public function orden()
    {
        return Orden::find($this->orden_id);
    }
    #[Computed()]
    public function empleado()
    {
        return Empleado::find($this->orden()->empleado_id);
    }

};
