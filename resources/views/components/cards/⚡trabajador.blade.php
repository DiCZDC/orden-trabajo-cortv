<?php

use Livewire\Component;

new class extends Component
{
    protected $trabajador = "Ernesto Ordoñez Maldonado";
    protected $cargo = "Ingeniero de Sistemas";
    protected $turno = "Turno Matutino";

};
?>

<div class="bg-white px-[5%] py-[5%] gap-3 items-center justify-between inline-flex justify-center align-middle">
    <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M23.3333 3.33337H9.99996C9.1159 3.33337 8.26806 3.68456 7.64294 4.30968C7.01782 4.93481 6.66663 5.78265 6.66663 6.66671V33.3334C6.66663 34.2174 7.01782 35.0653 7.64294 35.6904C8.26806 36.3155 9.1159 36.6667 9.99996 36.6667H30C30.884 36.6667 31.7319 36.3155 32.357 35.6904C32.9821 35.0653 33.3333 34.2174 33.3333 33.3334V13.3334M23.3333 3.33337L33.3333 13.3334M23.3333 3.33337L23.3333 13.3334H33.3333M26.6666 21.6667H13.3333M26.6666 28.3334H13.3333M16.6666 15H13.3333" stroke="#1E1E1E" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
    <div>
        <h1>
            {{ $this->trabajador }}
        </h1>
        <h2>
            {{ $this->cargo }}
        </h2>
        <p>
            {{ $this->turno }}
        </p>
    </div>
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
        <span class="text-cortvHueso text-center">
            Ver
        </span>
        
    </div>
    {{-- Smile, breathe, and go slowly. - Thich Nhat Hanh --}}
</div>