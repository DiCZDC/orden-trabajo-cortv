<?php

use Livewire\Component;
use Livewire\Attributes\Computed;
use App\Models\{
    Orden,
};
new class extends Component
{
    public $perPage = 9;

    #[Computed()]
    public function ordenes()
    {
        return Orden::paginate($this->perPage);
    }
    public function render()
    {
        return view('components.tabla.⚡orden.orden',[]);
    }

};