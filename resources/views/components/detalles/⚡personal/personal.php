<?php

use Livewire\Component;
use App\Models\{
    Proyecto,
    Orden,
    Trabajador,
    };
use Livewire\Attributes\Computed;


new class extends Component
{
    public $trabajador_id;

    public function mount($trabajador_id)
    {
        $this->trabajador_id = $trabajador_id;
    }
    #[Computed()]
    public function trabajador()
    {
        return Trabajador::find($this->trabajador_id);
    }
    #[Computed()]
    public function proyectos()
    {
        if($this->trabajador->productor === null){
            return collect();
        }
        return Proyecto::where('productor_id', $this->trabajador->productor->id)->orderBy('created_at', 'desc')->get();
    }
    #[Computed()]
    public function ordenes()
    {
        return Orden::where('trabajador_id', $this->trabajador_id)->orderBy('created_at', 'desc')->get();
    }
};