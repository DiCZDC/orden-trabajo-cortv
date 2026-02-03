<x-app-layout>
<div class="flex flex-col px-[5%] py-[1%] gap-4 transition-all lg:flex-row ">
        <!-- Contenedor Izquierda -->
            <div class="flex flex-col w-full px-[1%] transition-all xl:w-1/3 ">
                <livewire:forms.trabajador/>
            </div>
        <!-- Contenedor Derecha -->
        <div class="w-full px-[1%] transition-all xl:w-2/3">
            <livewire:tabla.trabajador />
        </div>  
    </div>
    <!-- Nothing in life is to be feared, it is only to be understood. Now is the time to understand more, so that we may fear less. - Maria Skłodowska-Curie -->
</x-app-layout>

