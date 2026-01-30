<div
    class="w-full flex flex-col rounded-2xl bg-white p-6 shadow-xl">
    <div class="flex justify-center mt-3">
        <span class="text-cortvRojoBasico text-5xl text-center font-bold tracking-[-0.96px] mb-3"
            style="font-family: 'Times New Roman', Times, serif;">
            Registrar un Nuevo Trabajador
        </span>
    </div>

    {{-- FORMULARIO --}}
    <div>
        <form wire:submit="save" class="flex flex-col px-7 py-4 gap-8 w-full text-black text-xl"
            style="font-family: 'Times New Roman', Times, serif;">
                                                          
            <!-- Que trabajador se elegira para el evento -->
            <div>
                <label for="trabajador" class="flex flex-col gap-1"> 
                    <span> Nombre del Trabajador </span>
                </label>

                <input list="trabajador" id="trabajador" name="trabajador" wire:model.blur="nombre_trabajador"
                        class="border-cortvBorde border-1 rounded-md p-2 h-[40px] w-full mt-2 text-[16px]"
                        placeholder="¿Cual es el nombre del trabajador?">
                
                <datalist id="trabajador">
                    {{-- @foreach($this->productos as $producto)
                        <option value="{{ $producto->nombre_producto }}">
                    @endforeach --}}
                </datalist>
                <div>
                    @error('nombre_trabajador')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div> 
            {{-- Donde se llevara a cabo la cita --}}
            <div>
                <label for="cargo" class="flex flex-col gap-1"> 
                    <span> Cargo </span>
                </label>

                <input list="cargo" id="cargo" name="cargo" wire:model.blur="nombre_cargo"
                        class="border-cortvBorde border-1 rounded-md p-2 h-[40px] w-full mt-2 text-[16px]"
                        placeholder="¿Cual es el cargo del trabajador? ">
                
                <datalist id="cargo">
                    {{-- @foreach($this->productos as $producto)
                        <option value="{{ $producto->nombre_producto }}">
                    @endforeach --}}
                </datalist>
                <div>
                    @error('nombre_cargo')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div> 
            {{-- Donde se llevara a cabo la cita --}}
            <div>
                <label for="proyecto" class="flex flex-col gap-1"> 
                    <span> Proyecto </span>
                </label>

                <input list="proyecto" id="proyecto" name="proyecto" wire:model.blur="nombre_proyecto"
                        class="border-cortvBorde border-1 rounded-md p-2 h-[40px] w-full mt-2 text-[16px]"
                        placeholder="¿Que proyecto tendra asignado? ">
                
                <datalist id="proyecto">
                    {{-- @foreach($this->productos as $producto)
                        <option value="{{ $producto->nombre_producto }}">
                    @endforeach --}}
                </datalist>
                <div>
                    @error('nombre_locacion')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div> 
            {{-- ¿En que dia se llevara a cabo la cita? --}}
            <div>
                <label for="fecha" class="flex flex-col gap-1"> 
                    <span> Fecha de la Cita </span>
                </label>

                <input
                    type="date"
                    id="fecha"
                    value="{{ date('Y-m-d') }}"
                    min="2000-01-01"
                    max="{{ date('Y-m-d') }}"
                    class="border-cortvBorde border-1 rounded-md p-2 h-[40px] w-full mt-2 text-[16px]"
                />
                <div>
                    @error('nombre_trabajador')
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