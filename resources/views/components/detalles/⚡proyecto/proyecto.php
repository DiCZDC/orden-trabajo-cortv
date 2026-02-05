<?php

use Livewire\Component;
use App\Models\{
    Proyecto,
    Orden,
    Trabajador,
    Empleado,
    Productor,
    };
use Livewire\Attributes\Computed;
new class extends Component
{
    public $proyecto_id;

    public function mount($proyecto_id)
    {
        $this->proyecto_id = $proyecto_id;
    }

    #[Computed()]
    public function proyecto()
    {
        return Proyecto::find($this->proyecto_id);
    }
    
    #[Computed()]
    public function ordenes()
    {
        return Orden::where('proyecto_id', $this->proyecto_id)->get();
    }
    #[Computed()]
    public function trabajadores()
    {
        return Empleado::where('proyecto_id', $this->proyecto_id)->get();
    }
    #[Computed()]
    public function productor()
    {
        return $this->proyecto()->productor;
        
        // Has('ordenes', function ($query) {
        //     $query->where('proyecto_id', $this->proyecto_id);
        // })->first();)
    }

};

