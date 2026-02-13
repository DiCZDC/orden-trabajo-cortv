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
        $this->orden()->save_data();
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
