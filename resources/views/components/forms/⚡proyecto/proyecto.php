<?php

use Livewire\Component;
use Livewire\Attributes\Computed;
use App\Models\{
    Proyecto,
    Trabajador,

};
use Livewire\Attributes\Validate;

new class extends Component
{
    #[Validate('required', message: 'El nombre del proyecto es obligatorio')]
    public $nombre_proyecto = '';

    #[Validate('required', message: 'Seleccione un productor')]
    #[Validate('exists:productos,nombre_producto', message: 'El producto seleccionado no es válido o no existe')]
    public $nombre_productor = '';
    
    public $nombre_actividad = '';
    public $nombre_locacion = '';




    #[Computed()]
    public function productores()
    {
        return Trabajador::where('cargo', 'PRODUCTOR')->pluck('nombre');
    }
    #[Computed()]
    public function locaciones()
    {
        // Assuming you have a Locacion model or similar
        return Proyecto::pluck('locacion')->unique();
    }

};