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

    #[Validate('required',message: 'Ingrese una actividad')]    
    public $nombre_actividad = '';

    #[Validate('required',message: 'Seleccione una locación')]
    public $nombre_locacion = '';

    #[Validate('required',message: 'Seleccione un proyecto')]
    #[Validate('exists:proyectos,nombre', message: 'El proyecto seleccionado no es válido o no existe')]
    public $nombre_proyecto= '';

    #[Validate('required',message: 'Seleccione una fecha')]
    public $nombre_fecha = '';

    public $hora_primer_tiro = '';
    public $hora_catering = '';
    public $hora_reinicio = '';
    public $hora_ultimo_tiro = '';  

    #[Validate('required',message: 'Por favor ingrese una hora de llamado')]
    public $hora_llamado = '';

    public $observaciones = '';

    public function save(){
        $this->validate();

        $proyecto = Proyecto::where('nombre', $this->nombre_proyecto)->first();
        $trabajador = Trabajador::where('nombre', $this->nombre_trabajador)->first();    

        // Verificar que el trabajador tenga un empleado asociado
        if (!$trabajador->empleado) {
            $this->addError('nombre_trabajador', 'El trabajador seleccionado no tiene un perfil de empleado asociado.');
            return;
        }

        Orden::create([
            'lugar_cita' => $this->nombre_locacion,
            'actividad' => $this->nombre_actividad,
            'fecha_cita' => $this->nombre_fecha,
            'empleado_id' => $trabajador->empleado->id,
            'proyecto_id' => $proyecto->id,
            'fecha_solicitud' => now(),
            'observaciones' => $this->observaciones,
            'hora_primer_tiro' => $this->hora_primer_tiro,
            'hora_catering' => $this->hora_catering,
            'hora_reinicio' => $this->hora_reinicio,
            'hora_ultimo_tiro' => $this->hora_ultimo_tiro,
            'hora_llamado' => $this->hora_llamado,

        ]);

        $this->reset();

        return redirect()->route('ordenes.index')->with('success', 'Orden de trabajo creada exitosamente.');   
}
    
    #[Computed()]
    public function locaciones()
    {
        return Orden::all()->pluck('lugar_cita')->unique();
    }

    #[Computed()]
    public function actividades()
    {
        return Orden::all()->pluck('actividad')->unique();
    }

    #[Computed()]
    public function proyectos()
    {
        return Proyecto::all();
    }
    #[Computed()]
    public function trabajadores()
    {
        return Trabajador::where('nombre', '!=', '')->get();
    }

      
};
