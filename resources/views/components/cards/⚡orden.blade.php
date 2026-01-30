<?php

use Livewire\Component;

new class extends Component
{
    protected $titulo = "Mensaje del Gobernador del Estado";
    protected $actividad = "Transmision del mensaje del gobernador del estado";
    protected $trabajador = "Ernesto Ordoñez Maldonado";

};
?>

<div class="bg-white rounded-lg border-[.5px] m-[5px]  px-[5%] py-[5%] gap-3 items-center justify-between flex flex-col transition-all align-middle">
    <div class="w-full flex flex-row align-middle items-center justify-between">

        
        <svg class ="w-15 h-15"
            width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M23.3333 3.33337H9.99996C9.1159 3.33337 8.26806 3.68456 7.64294 4.30968C7.01782 4.93481 6.66663 5.78265 6.66663 6.66671V33.3334C6.66663 34.2174 7.01782 35.0653 7.64294 35.6904C8.26806 36.3155 9.1159 36.6667 9.99996 36.6667H30C30.884 36.6667 31.7319 36.3155 32.357 35.6904C32.9821 35.0653 33.3333 34.2174 33.3333 33.3334V13.3334M23.3333 3.33337L33.3333 13.3334M23.3333 3.33337L23.3333 13.3334H33.3333M26.6666 21.6667H13.3333M26.6666 28.3334H13.3333M16.6666 15H13.3333" stroke="#1E1E1E" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        <div>
            <div class="w-auto ml-4">
                <p class="text-md font-bold ">
                    {{ $this->titulo }}
                </p>
                <p class="text-sm font-normal">        
                    Actividad: {{ $this->actividad }}
                </p>
                <p class="text-sm font-normal">
                    Para: {{ $this->trabajador }}
                </p>
            </div>
        </div>
    </div>

    <div class="rounded-[4px] px-[15px] py-1 bg-cortvRojoBasico shadow-xl inline-flex items-center  gap-2">
        <span class="text-cortvHueso text-center">
            Descargar
        </span>
        <svg width="13" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M22.75 16.25V20.5833C22.75 21.158 22.5217 21.7091 22.1154 22.1154C21.7091 22.5217 21.158 22.75 20.5833 22.75H5.41667C4.84203 22.75 4.29093 22.5217 3.8846 22.1154C3.47827 21.7091 3.25 21.158 3.25 20.5833V16.25M7.58333 10.8333L13 16.25M13 16.25L18.4167 10.8333M13 16.25V3.25" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </div>
    {{-- Live as if you were to die tomorrow. Learn as if you were to live forever. - Mahatma Gandhi --}}
</div>