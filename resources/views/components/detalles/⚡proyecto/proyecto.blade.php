<div>
    <div class="flex- flex-col 
                ">
    @if ($this->proyecto === null)
        <div class="flex justify-center">
            <p class="text-gray-500 text-4xl">Lo sentimos, el proyecto que solicitaste no existe.</p>
        </div>
        
    @else
            <div class="text-cortvRojoBasico gap-3.5 flex flex-col">
                {{-- Datos Principales --}}
                <div class="flex flex-col xl:flex-row justify-between">
                    
                    <div class="flex flex-col gap-5 w-[70%]">
                        <p class="text-5xl">
                            Informacion del proyecto
                        </p>
                        <p class="ml-4 text-2xl text-gray-600">
                            {{ $this->proyecto->nombre }}
                        </p>
                        <p class="text-3xl">
                            Fecha de Realización del Proyecto
                        </p>
                        <p class="ml-4 text-2xl text-gray-600">
                            {{ $this->proyecto->created_at->format('d M, Y') }}
                        </p>
                    </div>
                    {{-- Productor Responsable: --}}
                    <div class="flex flex-col gap-5 sm:w-[75%] md:w-[50%] xl:w-[30%]">
                        <p class="mt-10 text-3xl">
                            Productor Responsable:
                        </p>
                        @if ($this->productor !== null)
                            <livewire:cards.trabajador wire:key="trabajador-{{ $this->productor->id }}" :empleado="$this->productor" />
                        @else
                            <p class="text-gray-500 text-center border border-gray-300 rounded-md p-2">
                                No hay registros.
                            </p>
                        @endif

                    </div>
                </div>
                {{-- Tabla de Trabajadores --}}

                <p class="text-3xl mt-10">
                    Trabajadores Adscritos al Evento Actualmente:
                </p>
                <div class="grid grid-cols-1 mx-[2%] {{ $this->trabajadores->count()!== 0 ? "xl:grid-cols-2 2xl:grid-cols-3" : "" }} border border-gray-300 rounded-md p-4">
                    
                    @forelse($this->trabajadores as $trabajador)
                        <livewire:cards.trabajador wire:key="trabajador-{{ $trabajador->id }}" :empleado="$trabajador" />
                    @empty
                        <p class="text-gray-500 text-center">
                            No hay trabajadores adscritos a este proyecto.
                        </p>
                    @endforelse
                </div>
        </div>
    @endif
    {{-- When there is no desire, all things are at peace. - Laozi --}}
</div>