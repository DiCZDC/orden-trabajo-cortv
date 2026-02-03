<x-app-layout>
    <div class=" flex justify-center my-10">
        <div class="px-9 py-10 items-center self-center bg-white rounded-lg transition-all duration-300 ease-in-out w-[90%] xl:w-[85%] 2xl:w-[75%] shadow-md ">
            
            <div class="flex justify-between items-center mb-10">
                
                <a href="{{ route('proyectos.index') }}" class="text-cortvGrisTexto shadow-md border border-gray-300 hover:text-gray-700 font-bold py-2 px-4 rounded">
                    ← Volver a Proyectos
                </a>
            </div>

            <livewire:detalles.proyecto proyecto_id="{{ $id }}" />
        </div>
    </div>
    
    <!-- Live as if you were to die tomorrow. Learn as if you were to live forever. - Mahatma Gandhi -->
</x-app-layout>