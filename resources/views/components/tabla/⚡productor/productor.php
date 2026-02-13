<?php

use Livewire\Component;
use App\Models\{
    Productor, 
    Trabajador
    };
use Livewire\{
    WithPagination,
};
use Livewire\Attributes\{
    Computed,
};

new class extends Component
{
    public $perPage = 6;
    #[Computed()]
    public function productores()
    {        
        return Productor::latest()->
        where('trabajador_id', '>', 1)->
        paginate($this->perPage);
    }
};