<?php

use Livewire\Component;
use Livewire\Attributes\Computed;
use App\Models\{
    Productor,
    Proyecto,
    Trabajador,

};
use Livewire\Attributes\Validate;

use function Symfony\Component\Translation\t;

new class extends Component
{
    #[Validate('required', message: 'El nombre del proyecto es obligatorio')]
    public $nombre_proyecto = '';

    #[Validate('required', message: 'Seleccione un productor')]
    #[Validate('exists:trabajadors,nombre', message: 'El productor seleccionado no es válido o no existe')]
    public $nombre_productor = '';
        
    
    #[Validate('required', message: 'Ingrese la locación del proyecto')]
    public $nombre_locacion = '';

    public function save()
    {
        $this->validate();

        $productor = Trabajador::where('nombre', $this->nombre_productor)->first()->productor;

        Proyecto::create([
            'nombre' => $this->nombre_proyecto,
            'locacion' => $this->nombre_locacion,
            'productor_id' => $productor->id,
          
        ]);

        // Reset formields after saving
        $this->reset(['nombre_proyecto', 'nombre_productor', 'nombre_locacion']);
        return redirect()->route('proyectos.index');
    }



    #[Computed()]
    public function productores()
    {
        return Trabajador::whereHas('productor')
        ->where ('nombre', '!=', '')
        ->pluck('nombre');
    }
    #[Computed()]
    public function locaciones()
    {
        // Assuming you have a Locacion model or similar
        return Proyecto::pluck('locacion')->unique();
    }

};