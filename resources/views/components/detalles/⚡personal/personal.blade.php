<div class="transition-all">
    <div class="flex- flex-col 
                ">
    @if ($this->trabajador === null)
        <div class="flex justify-center">
            <p class="text-gray-500 text-4xl">Lo sentimos, no existe personal con la ID solicitada.</p>
        </div>
        
    @else
            <div class="text-cortvRojoBasico gap-3.5 flex flex-col">
                {{-- Datos Principales --}}
                    
                    <div class="flex flex-col gap-5 w-[70%]">
                        <p class="text-5xl">
                            Nombre del Trabajador
                        </p>
                        <p class="ml-4 text-2xl text-gray-600">
                            {{ strtoupper($this->trabajador->nombre) }}
                        </p>
                        <p class="text-3xl">
                            Cargo:
                        </p>
                        <p class="ml-4 text-2xl text-gray-600">
                            {{ strtoupper($this->trabajador->cargo) }}
                        </p>
                        
                        @if($this->trabajador->cargo !== 'PRODUCTOR')
                            <div class=" flex flex-col justify-between md:flex-row md:gap-10 lg:gap-20">
                                <div class="flex flex-col">
                                    <p class="text-3xl">
                                        Turno:
                                    </p>
                                    <p class="ml-4 text-2xl text-gray-600">
                                        {{ strtoupper($this->trabajador->turno) }}
                                    </p>
                                </div>
                                <div class="flex flex-col">
                                    <p class="text-3xl">
                                        Hora de Entrada:
                                    </p>
                                    <p class="ml-4 text-2xl text-gray-600">
                                        {{ \Carbon\Carbon::parse($this->trabajador->hora_entrada)->format('H:i')}} HRS
                                    </p>
                                </div>
                                <div class="flex flex-col">
                                    <p class="text-3xl">
                                        Hora de Salida:
                                    </p>
                                    <p class="ml-4 text-2xl text-gray-600">
                                        {{ \Carbon\Carbon::parse($this->trabajador->hora_salida)->format('H:i')}} HRS
                                    </p>
                                </div>
                            </div>
                        @endif
                    </div>
                {{-- Tabla de Ultimas Ordenes --}}
                <div>
                    <p class="text-3xl">
                        Ultimas Ordenes Asignadas:
                    </p>
                    <div class="grid grid-cols-1 mx-[2%] xl:grid-cols-2 2xl:grid-cols-3 border border-gray-300 rounded-md p-4">
                        @if($this->ordenes===null)
                            <p class="text-gray-500 text-center">
                                No hay ordenes asignadas a este trabajador.
                            </p>
                        @else
                            @foreach ($this->ordenes as $orden)
                                <livewire:cards.orden :orden="$orden" :small="false" />
                            @endforeach
                        @endif
                    </div>
                </div>

        </div>
    @endif
    {{-- When there is no desire, all things are at peace. - Laozi --}}
</div>