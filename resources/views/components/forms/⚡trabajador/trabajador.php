<?php

use Livewire\Component;
use Livewire\Attributes\Computed;
use App\Models\{
    Trabajador,
};

new class extends Component
{
    
    #[Computed(cache:true)]
    public function cargos(){
        return Trabajador::all()->pluck('cargo')->unique();
    }


    public function render()
    {
        return view('components.forms.⚡trabajador.trabajador');
    }

};