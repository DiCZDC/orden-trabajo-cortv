<?php

use Livewire\Component;
use App\Models\Proyecto;

new class extends Component
{
    public $background = false;
    //tipo 1 = proyectos, tipo 2 = ordenes, tipo = 3 Trabajadores
    public $tipo = 1; 
    //Titulos
    private $titles = [
        1 => 'Últimos Proyectos',
        2 => 'Últimas Órdenes Generadas',        
    ];   
    
    public function obtenerProyectosRecientes() {
        return Proyecto::orderBy('created_at', 'desc')->limit(3)->get();
    }
    
    public function mount($tipo, $background){
        $this->tipo = $tipo;
        if($this->tipo == 1){
            $this->background = true;
        }
    }
};
    
?>

<div class=" px-[5%] py-[5%] w-full flex flex-col gap-3 items-center {{$this->background ? 'bg-white shadow-xl ': ''}}">
    <h2 class="text-cortvRojoOscuro text-center text-3xl ">
        {{$this->titles[$this->tipo] }}
    </h2>
    @if ($this->background )
        Consulta los últimos proyectos realizados en el sistema.
    @endif
    <div class="space-y-4 w-full">
        <div class="grid grid-cols-1  gap-4 w-full">
            {{-- Aquí van las tarjetas de los proyectos --}}
            
                @switch($this->tipo)
                    @case(1)
                    @foreach($this->obtenerProyectosRecientes() as $proyecto)
                        <livewire:cards.proyecto 
                        :orden="$proyecto" wire:key="proyecto-{{ $proyecto->id }}"/>
                    @endforeach
                    @break

                    @case(2)
                        <livewire:cards.orden />
                        @break
                @endswitch
                
                
            
        </div>
    </div>
</div>