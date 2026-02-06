<?php

use Livewire\Component;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use App\Models\{
    Proyecto,

};

new class extends Component
{
    use WithPagination;
    public $perPage =6;
    public $search = '';

    #[Computed()]
    public function proyectos()
    {
        return Proyecto::search($this->search)
        ->orderBy('created_at','DESC')->paginate($this->perPage);
    }

    public function render()
    {
        return view('components.tabla.⚡proyecto.proyecto', [
        ]);
    }
};