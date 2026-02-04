<?php

use Livewire\Component;
new class extends Component
{
    protected $titulo = "Mensaje del Gobernador del Estado";
    protected $productor = "Ernesto Ordoñez Maldonado";
    protected $fecha;
    public $orden;
    public $proyecto;
    public function mount($proyecto)
    {
        $this->proyecto = $proyecto;
    }
};
?>


<div class="bg-white rounded-lg border-[.5px] m-[5px]  px-[5%] py-[5%] gap-3 items-center justify-between flex flex-col transition-all align-middle">
    <div class="w-full gap-4 flex flex-row align-middle items-center justify-between">
        <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M34.5 10.5L24 18L34.5 25.5V10.5Z" stroke="#1E1E1E" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M21 7.5H4.5C2.84315 7.5 1.5 8.84315 1.5 10.5V25.5C1.5 27.1569 2.84315 28.5 4.5 28.5H21C22.6569 28.5 24 27.1569 24 25.5V10.5C24 8.84315 22.6569 7.5 21 7.5Z" stroke="#1E1E1E" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        <div>
            <p class="text-md font-bold ">  
                {{ $this->titulo }}
            </p>
            <p class="text-sm font-normal">
                <b>Productor: </b>{{ $this->productor }}
            </p>
            <p class="text-xs ">
                <b>Fecha: </b>{{ $this->fecha }}
            </p>
        </div>

    </div>
    
    

    <a href="{{ route('proyectos.show', ['id' => $this->proyecto->id]) }}">
            <div class="rounded-[4px] px-[15px] py-1 bg-cortvRojoBasico shadow-xl inline-flex items-center gap-2">
                <svg width="16" height="16" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_9_202)">
                        <path d="M1.08337 13C1.08337 13 5.41671 4.33331 13 4.33331C20.5834 4.33331 24.9167 13 24.9167 13C24.9167 13 20.5834 21.6666 13 21.6666C5.41671 21.6666 1.08337 13 1.08337 13Z" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M13 16.25C14.795 16.25 16.25 14.7949 16.25 13C16.25 11.2051 14.795 9.74998 13 9.74998C11.2051 9.74998 9.75004 11.2051 9.75004 13C9.75004 14.7949 11.2051 16.25 13 16.25Z" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_9_202">
                        <rect width="26" height="26" fill="white"/>
                        </clipPath>
                    </defs>
                </svg>
                
                {{-- @else
                    <span class="text-cortvHueso text-center">
                        No se asignó ninguna orden
                    </span>
                @endif     --}}
                <span class="text-cortvHueso text-center">
                        Ver
                </span>
            </div>
        </a>
    
</div>
