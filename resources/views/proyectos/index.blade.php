<x-app-layout>
    <div class="flex flex-col px-[8%] py-[3%] gap-4 lg:flex-row ">
        <!-- Contenedor Izquierda -->
            <div class="flex flex-col w-full px-[1%] transition-all 2xl:w-1/3 ">
                <livewire:forms.proyecto />
                
            </div>
        <!-- Contenedor Derecha -->
        <div class="w-full px-[1%] transition-all 2xl:w-2/3">
            <livewire:tabla.proyecto />
        </div>  
    </div>
    <!-- Simplicity is the ultimate sophistication. - Leonardo da Vinci -->
</x-app-layout>