<?php

use Livewire\Component;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\DB;
use App\Models\{
    Proyecto,

};

new class extends Component
{
    public $perPage =6;

    #[Computed()]
    public function proyectos()
    {
        return Proyecto::orderBy('created_at','DESC')->paginate($this->perPage);
    }

    public function render()
    {
        return view('components.tabla.⚡proyecto.proyecto', [
        ]);
    }
};