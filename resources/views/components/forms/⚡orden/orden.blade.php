<div
    class="w-full flex flex-col rounded-2xl bg-white p-6 shadow-xl">
    <div class="flex justify-center mt-3">
        <span class="text-cortvRojoBasico text-5xl text-center font-bold tracking-[-0.96px] mb-3"
            style="font-family: 'Times New Roman', Times, serif;">
            Generar una Orden de Trabajo   
        </span>
    </div>

    {{-- FORMULARIO --}}
    <div>
        <form wire:submit="save" class="flex flex-col px-7 py-4 gap-8 w-full text-black text-xl"
            style="font-family: 'Times New Roman', Times, serif;">
                                                          
            <!-- Que trabajador se elegira para el evento -->
            <div>
                <label for="trabajador" class="flex flex-col gap-1"> 
                    <span> Trabajador </span>
                </label>

                <input list="trabajadores" id="trabajador" name="trabajador" wire:model.blur="nombre_trabajador"
                        class="border-cortvBorde border-1 rounded-md p-2 h-[40px] w-full mt-2 text-[16px]"
                        placeholder="¿A que trabajador se le asignara la orden?">
                
                <datalist id="trabajadores">
                    @foreach($this->trabajadores as $trabajador)
                        <option value="{{ $trabajador->nombre }}">
                    @endforeach
                </datalist>
                <div>
                    @error('nombre_trabajador')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            
            {{-- Que Actividad realizara el trabajador en la orden creada--}}
             <div>
                <label for="Actividad" class="flex flex-col gap-1"> 
                    <span> Actividad </span>
                </label>

                <input list="actividades" id="actividad" name="actividad" wire:model.blur="nombre_actividad"
                        class="border-cortvBorde border-1 rounded-md p-2 h-[40px] w-full mt-2 text-[16px]"
                        placeholder="¿Qué actividad realizará el trabajador?">
                
                <datalist id="actividades">
                    @foreach($this->actividades as $actividad)
                        <option value="{{ $actividad }}">
                    @endforeach
                </datalist>
                <div>
                    @error('nombre_actividad')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            {{-- horas de las ordenes de trabajo  --}}
            <div class="grid grid-cols-2 gap-x-6 gap-y-4">

                {{-- Primer tiro --}}
                <div class="flex flex-col items-center">
                    <label for="primer_tiro" class="text-center mb-1">
                        Hora del primer tiro
                    </label>
                    <input type="time" id="primer_tiro" name="primer_tiro" wire:model.blur="hora_primer_tiro"
                            class="border-cortvBorde border-1 rounded-md p-2 h-[40px] text-center text-[16px] w-[140px] text-gray-500">
                    @error('hora_primer_tiro')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Catering --}}
                <div class="flex flex-col items-center">
                    <label for="catering" class="text-center mb-1">
                        Hora del catering
                    </label>
                    <input type="time" id="catering" name="catering" wire:model.blur="hora_catering"
                            class="border-cortvBorde border-1 rounded-md p-2 h-[40px] text-center text-[16px] w-[140px] text-gray-500">
                    @error('hora_catering')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Reinicio de grabación --}}
                <div class="flex flex-col items-center">
                    <label for="reinicio" class="text-center mb-1">
                        Hora de reinicio 
                    </label>
                    <input type="time" id="reinicio" name="reinicio" wire:model.blur="hora_reinicio"
                            class="border-cortvBorde border-1 rounded-md p-2 h-[40px] text-center text-[16px] w-[140px] text-gray-500">
                    @error('hora_reinicio')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Último tiro --}}
                <div class="flex flex-col items-center">
                    <label for="ultimo_tiro" class="text-center mb-1">
                        Hora de último tiro
                    </label>
                    <input type="time" id="ultimo_tiro" name="ultimo_tiro" wire:model.blur="hora_ultimo_tiro"
                            class="border-cortvBorde border-1 rounded-md p-2 h-[40px] text-center text-[16px] w-[140px] text-gray-500">
                    @error('hora_ultimo_tiro')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

            </div>

            {{-- Donde se llevara a cabo la cita --}}
            <div>
                <label for="locacion" class="flex flex-col gap-1"> 
                    <span> Lugar de cita </span>
                </label>

                <input list="locaciones" id="locacion" name="locacion" wire:model.blur="nombre_locacion"
                        class="border-cortvBorde border-1 rounded-md p-2 h-[40px] w-full mt-2 text-[16px]"
                        placeholder="¿Donde sera el punto de encuentro? ">
                
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
            {{-- Donde se llevara a cabo la cita --}}
            <div>
                <label for="proyecto" class="flex flex-col gap-1"> 
                    <span> Proyecto </span>
                </label>

                <input list="proyectos" id="proyecto" name="proyecto" wire:model.blur="nombre_proyecto"
                        class="border-cortvBorde border-1 rounded-md p-2 h-[40px] w-full mt-2 text-[16px]"
                        placeholder="¿Que proyecto tendra asignado? ">
                
                <datalist id="proyectos">
                    @foreach($this->proyectos as $proyecto)
                        <option id= "{{ $proyecto->id }}"value="{{ $proyecto->nombre }}">
                    @endforeach
                </datalist>
                <div>
                    @error('nombre_proyecto')
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
                    min="2020-01-01"
                    max=""
                    class="border-cortvBorde border-1 rounded-md p-2 h-[40px] w-full mt-2 text-[16px]"
                    wire:model.blur="nombre_fecha"
                />
                <div>
                    @error('nombre_fecha')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div> 

            <div>
                <label for="hora_llamado" class="flex flex-col gap-1 mb-2"> 
                    <span> Hora de Llamado </span>
                </label>

                <input type="time" id="hora_llamado" name="hora_llamado" wire:model.blur="hora_llamado"
                            class="border-cortvBorde border-1 rounded-md p-2 h-[40px] align-center
                            text-center text-[16px] w-full text-gray-500">
                
                <div>
                    @error('hora_llamado')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div> 


            <div>
                <label for="observaciones" class="flex flex-col gap-1 mb-2"> 
                    <span> Observaciones </span>
                </label>

                <textarea id="observaciones" name="observaciones" wire:model.blur="observaciones"
                            class="border-cortvBorde border-1 rounded-md p-2 h-[40px] align-center
                            text-center text-[16px] w-full text-gray-500">
                </textarea>
                
                <div>
                    @error('observaciones')
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