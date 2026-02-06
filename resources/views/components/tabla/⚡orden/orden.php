<?php

use Livewire\Component;
use Livewire\Attributes\Computed;
use Livewire\WithPagination;
use App\Models\{
    Orden,
};
new class extends Component
{
    use WithPagination;
    public $perPage = 9;
    public $search = '';
    public $fecha;

    public function mount($fecha = null)
    {
        $this->fecha =$fecha ?? date('Y-m-d', strtotime('+1 month'));
    }

    #[Computed(cache: false)]
    public function ordenes()
    {
        return Orden::search($this->search)
        ->where('fecha_cita', '<', $this->fecha)
        ->orderBy('fecha_cita', 'desc')
        ->paginate($this->perPage);
    }
    public function render()
    {
        return view('components.tabla.⚡orden.orden',[]);
    }

};