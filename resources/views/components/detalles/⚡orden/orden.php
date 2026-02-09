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
            'hora_inicio' => $this->empleado()->hora_entrada,
            'hora_fin' => $this->empleado()->hora_salida,
            'fecha_solicitud' => $this->orden()->fecha_solicitud->format('Y-m-d'),
            'fecha_llamado' => $this->orden()->fecha_cita->format('Y-m-d'),
            'hora_llamado' => $this->orden()->hora_llamado,
            'lugar_cita' => $this->orden()->lugar_cita,
            'locacion' => $this->orden()->proyecto->locacion,
            'actividades' => $this->orden()->actividad,
            'asistente' => 'Carlos Gomez',
            'director_proyecto' => 'PENDEJO DANIEL',
            'nombre_proyecto' => $this->orden()->proyecto->nombre,
            'hora_catering' => $this->orden()->hora_catering,
            'hora_reinicio' => $this->orden()->hora_reinicio,
            'hora_ultimo_tiro' => $this->orden()->hora_ultimo_tiro,
            'observaciones' => $this->orden()->observaciones,
            
            'operaciones_nombre' => 'ING. EDWIN MARTÍNEZ CRUZ',
            'productor' => $this->orden()->proyecto->productor->trabajador->nombre,
            'director' => 'LIC. DIANA ISIS MOLINA DOMINGUEZ',
        ]);
        // return (new pdfController())->generatePDF($this->Orden, $this->empleado);
        $this->js("window.open('".route('ordenes.pdf')."', '_blank')");
        
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
