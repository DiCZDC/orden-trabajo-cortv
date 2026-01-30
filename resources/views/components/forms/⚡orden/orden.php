<?php

use Livewire\Component;
use Livewire\Attributes\Computed;
use App\Models\{
    Orden,
    Trabajador,
    Proyecto
};

new class extends Component
{
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
