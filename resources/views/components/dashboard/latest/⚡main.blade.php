<?php

use Livewire\Component;

new class extends Component
{
    public $background = false;
    //tipo 1 = proyectos, tipo 2 = ordenes, tipo = 3 Trabajadores
    public $tipo = 1; 
    //Titulos
    private $titles = [
        1 => 'Últimos Proyectos Editados',
        2 => 'Últimas Órdenes Generadas',
        3 => 'Últimos Trabajadores Registrados'
    ];   
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
        DANI PENDEJO
    @endif
    <div class="space-y-4 w-full">
        <div class="grid grid-cols-1  gap-4 w-full">
            {{-- Aquí van las tarjetas de los proyectos --}}
            @for ($i = 0; $i < 3; $i++)
                @switch($this->tipo)
                    @case(1)
                        <livewire:cards.proyecto />
                        @break
                    @case(2)
                        <livewire:cards.orden />
                        @break
                        
                @endswitch
                
                
            @endfor
        </div>
    </div>
</div>