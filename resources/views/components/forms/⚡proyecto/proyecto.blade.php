<div
    class="w-full flex flex-col rounded-2xl bg-white p-6 shadow-xl">
    <div class="flex justify-center mt-3">
        <span class="text-cortvRojoBasico text-5xl text-center font-bold tracking-[-0.96px] mb-3">
            Crea un Nuevo Proyecto
        </span>
    </div>

    {{-- FORMULARIO --}}
    <div>
        <form wire:submit="save" class="flex flex-col px-7 py-4 gap-8 w-full text-black text-xl">
                                                          
            <!--Como se llama el proyecto -->
            <div>
                <label for="proyecto" class="flex flex-col gap-1"> 
                    <span> Nombre del Proyecto </span>
                </label>

                <input id="proyecto" name="proyecto" wire:model.blur="nombre_proyecto"
                        class="border-cortvBorde border-1 rounded-md p-2 h-[40px] w-full mt-2 text-[16px]"
                        placeholder="¿Que nombre tiene el proyecto?">
                
                <div>
                    @error('nombre_proyecto')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div> 
            {{-- Quien es el productor --}}
            <div>
                <label for="productor" class="flex flex-col gap-1"> 
                    <span> Productor </span>
                </label>

                <input list="productores" id="productor" name="productor" wire:model.blur="nombre_productor"
                        class="border-cortvBorde border-1 rounded-md p-2 h-[40px] w-full mt-2 text-[16px]"
                        placeholder="¿Que productor realizara el proyecto? ">
                
                <datalist id="productores">
                    @foreach($this->productores as $productor)
                        <option value="{{ $productor }}">
                    @endforeach
                </datalist>
                <div>
                    @error('nombre_locacion')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div> 
            
                        
           {{-- Donde se llevara a cabo la cita --}}
            <div>
                <label for="locacion" class="flex flex-col gap-1"> 
                    <span> Locacion </span>
                </label>

                <input list="locaciones" id="locacion" name="locacion" wire:model.blur="nombre_locacion"
                        class="border-cortvBorde border-1 rounded-md p-2 h-[40px] w-full mt-2 text-[16px]"
                        placeholder="¿Donde se llevara a cabo el proyecto? ">
                
                <datalist id="locaciones">
                    @foreach($this->locaciones as $locacion)
                        <option value="{{ $locacion }}">
                    @endforeach
                </datalist>
                <div>
                    @error('nombre_locacion')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div> 
            

            <!-- boton de Enviar  -->

            <div class="mt-1">
                <button type="submit"
                    class="w-full bg-cortvRojoOscuro rounded-md flex justify-center p-2 cursor-pointer hover:bg-cortvRojoBasico">
                    <span class="text-base text-white ">Generar</span>
                </button>
                <div wire:loading wire:target="save" class="w-full text-center text-cortvRojoOscuro mt-2">
                    Generando...
                </div>
            </div>
            @if (session()->has('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

        </form>

    </div>

</div>