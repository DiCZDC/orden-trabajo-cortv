<div>
    @if ($this->orden === null)
        <div class="flex justify-center">
            <p class="text-gray-500 text-4xl">Lo sentimos, no existe personal con la ID solicitada.</p>
        </div>
        
    @else
        <div class="text-cortvRojoBasico gap-3.5 flex flex-col">
            {{-- Datos Principales --}}
                
            <div class="flex flex-col gap-5">
                {{-- ID de la orden --}}
                    <div class="flex flex-row justify-end gap-4 items-center">
                        <p class="text-3xl">
                            ID de la Orden:
                        </p>
                        <p class="ml-4 text-2xl text-gray-600">
                            {{ $this->orden->id }}
                        </p>
                    </div>
                {{-- Proyecto y actividad --}}
                {{-- Nombre del Trabajador --}}
                <x-details-col :small="false" :titulo="'Trabajador Asignado'" :data="$this->orden->empleado->trabajador->nombre" />
                {{-- Division --}}
                <hr>
                {{-- Cargo del Trabajador --}}    
                <div class="grid grid-cols-1 justify-between gap-4  md:grid-cols-2 items-center ">
                    {{-- Proyecto --}}
                        <x-details-col :small="true" 
                            :titulo="'Proyecto'" 
                            :data="$this->orden->proyecto->nombre" 
                        />
                    {{-- Actividad --}}
                    <x-details-col 
                    :small="true" :titulo="'Actividad'" 
                    :data="$this->orden->actividad" 
                    />
                    {{-- Lugar Cita --}}
                    <x-details-col 
                    :small="true" :titulo="'Lugar de Cita'" 
                    :data="$this->orden->lugar_cita" 
                    />
                    {{-- Fecha de Cita --}}
                    <x-details-col 
                    :small="true" :titulo="'Fecha de Cita'" 
                    :data=" \Carbon\Carbon::parse($this->orden->fecha_cita)->format('d F Y') " 
                    />
                </div>
                    
                
                    
                
                    
                </div>
            {{-- Tabla de Ultimas Ordenes --}}
            <div class="flex items-center justify-center mt-10">
                <a wire:click="generatePDF" href="#">
                    <div class="rounded-[4px] px-[15px] py-1 bg-cortvRojoBasico hover:bg-cortvRojoOscuro transition-colors h-auto duration-200 shadow-xl inline-flex items-center gap-2">
                        <span class="text-cortvHueso text-xl text-center">
                            Descargar Orden en Formato PDF
                        </span>
                        <svg width="13" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M22.75 16.25V20.5833C22.75 21.158 22.5217 21.7091 22.1154 22.1154C21.7091 22.5217 21.158 22.75 20.5833 22.75H5.41667C4.84203 22.75 4.29093 22.5217 3.8846 22.1154C3.47827 21.7091 3.25 21.158 3.25 20.5833V16.25M7.58333 10.8333L13 16.25M13 16.25L18.4167 10.8333M13 16.25V3.25" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                </a>
            </div>
        </div>
    @endif
    {{-- We must ship. - Taylor Otwell --}}
</div>