<?php

use Livewire\Component;
use App\Models\Trabajador;
use Livewire\Attributes\Computed;
new class extends Component
{
    public $areaFilter = '';
    public $perPage = 10;
    public $search = '';
    #[Computed()]
    public function areas()
    {
        return Trabajador::
        pluck('cargo')->
        unique();
    }
    #[Computed()]
    public function trabajadores()
    {
        return Trabajador::Search($this->search)
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
