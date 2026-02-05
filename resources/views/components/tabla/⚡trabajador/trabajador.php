<?php

use Livewire\Component;
use App\Models\Empleado;
use Livewire\Attributes\Computed;
new class extends Component
{
    public $areaFilter = '';
    public $perPage = 9;
    public $search = '';
    #[Computed()]
    public function areas()
    {
        return Empleado::
        pluck('cargo')->
        unique();
    }
    #[Computed()]
    public function trabajadores()
    {
        return Empleado::Search($this->search)
            ->when($this->areaFilter !== '', function ($query) {
                    $query->where('cargo', $this->areaFilter);
                })
                ->paginate($this->perPage);
    }
    public function render()
    {
        return view('components.tabla.⚡trabajador.trabajador',[
        ]);
    }
};
