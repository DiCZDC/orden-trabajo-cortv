<?php

use Livewire\Component;
use Livewire\Attributes\Computed;
use App\Models\{
    Proyecto,
    Trabajador,

};
new class extends Component
{
    

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