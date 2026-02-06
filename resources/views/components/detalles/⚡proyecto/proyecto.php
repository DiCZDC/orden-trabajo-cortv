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
use Livewire\WithPagination;
new class extends Component
{
    use WithPagination;
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
        return $this->ordenes->where('fecha_cita','>',date('Y-m-d'))
            ->flatMap(function ($orden) {
            return [$orden->empleado];
        })->unique('id');
    }
    #[Computed()]
    public function productor()
    {
        return $this->proyecto()->productor;
    }

};

