<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}
    <!--cONTENEDOR PRINCIPAL-->
    <div class="flex flex-col px-[10%] gap-10 xs:px-[15%] py-[12px] lg:flex-row item-center justify-center ">
        <!-- Contenedor Izquierda -->
            <div class="flex flex-col px-[1%] w-[41%]">
                    
                <!-- Izquierda Bienvenida -->
                <div class="bg-white px-[5%] py-[2%] w-full flex flex-col gap-3 items-center shadow-xl">
                    <h1 class="text-[25px] font-bold text-cortvGrisTexto ">
                        Bienvenido de Nuevo, {{Auth::user()->name}}!
                    </h1>
                    <a href="{{ route('ordenes.index') }}">
                        <div class="p-[9px] bg-cortvRojoBasico text-cortvHueso rounded-[8px] flex items-center justify-center hover:bg-cortvRojoOscuro transition-colors duration-200">
                            <span class="justify-self-center">
                            Genera una nueva orden aqui
                            </span>
                        </div>
                    </a>
                    
                </div>
                <!--- Izquierda Ultimos Proyectos -->
                <div class="mt-4 w-full ">
                    <livewire:dashboard.latest.main :tipo="1" :background="true" />    
                </div>
            </div>

        <!-- Contenedor Derecha -->
        <div class=" px-[1%]  ">
            <livewire:dashboard.latest.main :tipo="2" :background="false"/>
        </div>
    </div>
</x-app-layout>
