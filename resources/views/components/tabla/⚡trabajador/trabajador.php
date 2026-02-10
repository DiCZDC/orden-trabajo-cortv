<?php

use Livewire\Component;
use App\Models\{
    Empleado, 
    Trabajador
    };
use Livewire\{
    WithPagination,
};

use Livewire\Attributes\{
    Computed,
    Url,
};

new class extends Component
{
    use withPagination;

    #[Url(history: true)]
    public $areaFilter = '';
    #[Url(history: true)]
    public $perPage = 9;
    #[Url(history: true)]  
    public $search = '';
    
    public function updatingSearch()
    {
        $this->resetPage();
    }
    
    public function updatingAreaFilter()
    {
        $this->resetPage();
    }
    
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
        return Trabajador::search($this->search)
            ->when($this->areaFilter !== '', function ($query) {
                $query->whereHas('empleado', function($q) {
                $q->where('cargo', $this->areaFilter);
                });
            })
            ->whereDoesntHave('productor')
            ->paginate($this->perPage);
    }
    #[Computed()]
    public function productores()
    {
        return Trabajador::search($this->search)
            ->when($this->areaFilter !== '', function ($query) {
                $query->whereHas('empleado', function($q) {
                $q->where('cargo', $this->areaFilter);
                });
            })
            ->whereHas('productor')
            ->paginate($this->perPage);
    }
    public function render()
    {
        return view('components.tabla.⚡trabajador.trabajador',[]);
    }
};
