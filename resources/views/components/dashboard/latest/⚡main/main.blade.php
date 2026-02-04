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
                            :proyecto="$proyecto" wire:key="proyecto-{{ $proyecto->id }}"/>
                        @endforeach
                    @break
                    @case(2)
                        @foreach ($this->ordenes() as $orden)
                            <livewire:cards.orden :orden="$orden" wire:key="orden-{{ $orden->id }}" />
                        @endforeach
                    @break
                @endswitch
                
                
            
        </div>
    </div>
</div>