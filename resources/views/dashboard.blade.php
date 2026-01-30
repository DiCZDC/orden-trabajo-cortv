<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}
    <!--cONTENEDOR PRINCIPAL-->
    <div class="flex flex-row px-[10%] xs:px-[12%] py-[12px] ">
        <!-- Contenedor Izquierda -->
            <div class="flex flex-col w-1/2 px-[1%] ">
                    
                <!-- Izquierda Bienvenida -->
                <div class="bg-white px-[5%] py-[2%] w-full flex flex-col gap-3 items-center shadow-xl">
                    <h1 class="text-[25px] font-bold text-cortvGrisTexto ">
                        Bienvenido de Nuevo, {{Auth::user()->name}}!
                    </h1>
                    <div class="p-[9px] bg-cortvRojoOscuro text-cortvHueso rounded-[8px] flex items-center justify-center">
                        
                        <span class="justify-self-center">
                        Genera una nueva orden aqui
                        </span>
                    </div>
                    
                </div>
                <!--- Izquierda Ultimos Proyectos -->
                <div class="mt-4 w-full">
                    <livewire:dashboard.latest.main :tipo="1" :background="true" />    
                </div>
            </div>

        <!-- Contenedor Derecha -->
        <div class="w-1/2 px-[1%] ">
            <livewire:dashboard.latest.main :tipo="2" :background="false"/>
        </div>
    </div>
</x-app-layout>
