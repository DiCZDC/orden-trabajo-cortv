<?php

use Livewire\Component;
use App\Models\{
    Orden,
    Empleado
};
use App\Http\Controllers\pdfController;
use Livewire\Attributes\Computed;
new class extends Component
{
    public $Orden;
    public $small = true;
    public function mount($orden,$small)
    {
        $this->small = $small;
        $this->Orden = $orden;
    }
    public function generatePDF(){
        session()->put('ultima_orden',[
            'nombre' => $this->empleado()->trabajador->nombre,
            'cargo' => $this->empleado()->cargo,
            'contrato' => true,
            'area' => 'TV',
            'hora_inicio' => $this->empleado()->hora_entrada,
            'hora_fin' => $this->empleado()->hora_salida,
            'fecha_solicitud' => $this->Orden->fecha_solicitud->format('Y-m-d'),
            'fecha_llamado' => $this->Orden->fecha_cita->format('Y-m-d'),
            'hora_llamado' => $this->Orden->hora_llamado,
            'lugar_cita' => $this->Orden->lugar_cita,
            'locacion' => $this->Orden->proyecto->locacion,
            'actividades' => $this->Orden->actividad,
            'asistente' => 'Carlos Gomez',
            'director_proyecto' => 'PENDEJO DANIEL',
            'nombre_proyecto' => $this->Orden->proyecto->nombre,
            'hora_catering' => $this->Orden->hora_catering,
            'hora_reinicio' => $this->Orden->hora_reinicio,
            'hora_ultimo_tiro' => $this->Orden->hora_ultimo_tiro,
            'observaciones' => $this->Orden->observaciones,
            
            'operaciones_nombre' => 'ING. EDWIN MARTÍNEZ CRUZ',
            'productor' => $this->Orden->proyecto->productor->trabajador->nombre,
            'director' => 'LIC. DIANA ISIS MOLINA DOMINGUEZ',
        ]);
        // return (new pdfController())->generatePDF($this->Orden, $this->empleado);
        $this->js("window.open('".route('ordenes.pdf')."', '_blank')");
    }
    #[Computed()]
    public function empleado()
    {
        return Empleado::find($this->Orden->empleado_id);
    }
};
?>

<div class="bg-white rounded-lg border-[.5px] m-[5px]  px-[5%] py-[5%] gap-3 items-center justify-between flex transition-all align-middle {{$small? "flex-col":"flex-row" }}">
    <div class="w-full flex flex-row align-middle items-center {{ $small ? "justify-start": "justify-start" }}">

        
        <svg class ="w-15 h-15"
            width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M23.3333 3.33337H9.99996C9.1159 3.33337 8.26806 3.68456 7.64294 4.30968C7.01782 4.93481 6.66663 5.78265 6.66663 6.66671V33.3334C6.66663 34.2174 7.01782 35.0653 7.64294 35.6904C8.26806 36.3155 9.1159 36.6667 9.99996 36.6667H30C30.884 36.6667 31.7319 36.3155 32.357 35.6904C32.9821 35.0653 33.3333 34.2174 33.3333 33.3334V13.3334M23.3333 3.33337L33.3333 13.3334M23.3333 3.33337L23.3333 13.3334H33.3333M26.6666 21.6667H13.3333M26.6666 28.3334H13.3333M16.6666 15H13.3333" stroke="#1E1E1E" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        <div>
            <div class="w-auto ml-4">
                <p class="text-md font-bold ">
                    {{ $Orden->proyecto->nombre }}
                </p>
                <p class="text-sm font-normal overflow-hidden">
                    Para: {{ $Orden->empleado->trabajador->nombre }}
                </p>
                <p class="text-sm font-normal">        
                    Fecha de cita: {{ $Orden->fecha_cita->format('M d, Y') }}
                </p>
            </div>
        </div>
    </div>
    
    <div class="flex items-center flex-row gap-4">
        <a href="{{ route('ordenes.show', ['id' => $Orden->id]) }}">
            <div class="rounded-[4px] px-[15px] py-1 bg-cortvRojoBasico hover:bg-cortvRojoOscuro transition-colors h-auto duration-200 shadow-xl inline-flex items-center gap-2">
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
            </a>
        </a>
        <a wire:click="generatePDF" href="#">
            <div class="rounded-[4px] px-[15px] py-1 bg-cortvRojoBasico hover:bg-cortvRojoOscuro transition-colors h-auto duration-200 shadow-xl inline-flex items-center gap-2">
                <span class="text-cortvHueso text-center">
                    Descargar
                </span>
                <svg width="13" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M22.75 16.25V20.5833C22.75 21.158 22.5217 21.7091 22.1154 22.1154C21.7091 22.5217 21.158 22.75 20.5833 22.75H5.41667C4.84203 22.75 4.29093 22.5217 3.8846 22.1154C3.47827 21.7091 3.25 21.158 3.25 20.5833V16.25M7.58333 10.8333L13 16.25M13 16.25L18.4167 10.8333M13 16.25V3.25" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
        </a>
    </div>
    {{-- Live as if you were to die tomorrow. Learn as if you were to live forever. - Mahatma Gandhi --}}
</div>