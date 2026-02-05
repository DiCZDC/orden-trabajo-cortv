<?php

use Livewire\Component;
use Livewire\Attributes\Computed;
use App\Models\{
    Orden,
    Trabajador,
    Proyecto
};
use Livewire\Attributes\Validate;

new class extends Component
{

    #[Validate('required',message: 'Seleccione un trabajador')]
    #[Validate('exists:trabajadors,nombre', message: 'El trabajador seleccionado no es válido o no existe')]
    public $nombre_trabajador = '';

    #[Validate('required',message: 'Seleccione una locación')]
    public $nombre_locacion = '';

    #[Validate('required',message: 'Seleccione un proyecto')]
    #[Validate('exists:proyectos,nombre', message: 'El proyecto seleccionado no es válido o no existe')]
    public $nombre_proyecto= '';

    #[Validate('required',message: 'Seleccione una fecha')]
    public $nombre_fecha = '';


    public function save(){
        $this->validate();

        $proyecto = Proyecto::where('nombre', $this->nombre_proyecto)->first();
        $trabajador = Trabajador::where('nombre', $this->nombre_trabajador)->first();    

        Orden::create([
            'lugar_cita' => $this->nombre_locacion,
            'fecha_cita' => $this->nombre_fecha,
            'trabajador_id' => $trabajador->id,
            'proyecto_id' => $proyecto->id,
            'fecha_solicitud' => now(),
        ]);

        $this->reset(['nombre_locacion', 'nombre_fecha', 'nombre_trabajador', 'nombre_proyecto']);

        return redirect()->route('ordenes.index')->with('success', 'Orden de trabajo creada exitosamente.');   
}
    
    #[Computed()]
    public function locaciones()
    {
        return Orden::all()->pluck('lugar_cita')->unique();
    }
    #[Computed()]
    public function proyectos()
    {
        return Proyecto::all();
    }
    #[Computed()]
    public function trabajadores()
    {
        return Trabajador::all();
    }

      
};
