<?php

use Livewire\Component;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use App\Models\{
    Trabajador,
};

new class extends Component
{
    #[Validate( 'required', 'string', 'max:255',message:'El nombre del productor es requerido y debe ser una cadena de texto con un máximo de 255 caracteres.s')]   
    public $nombre_productor;

    #[Computed(cache:true)]
    public function cargos(){
        return Trabajador::all()->pluck('cargo')->unique();
    }
};