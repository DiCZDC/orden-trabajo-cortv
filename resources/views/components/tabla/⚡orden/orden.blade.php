<section >
            <div class="relative  overflow-hidden">
                <div class=" flex items-center  sm:rounded-lg justify-between gap-2 p-5 flex-col xl:flex-row">
                    <div class="flex w-full">
                        <div class="relative w-full ">
                           
                            <input  
                                wire:model.live.debounce.650ms="search"
                                type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 "
                                placeholder="Buscar por ID o Nombre" required="">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                    fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="flex space-x-3">
                        <div class="flex space-x-3 items-center">
                            <label class="w-80 text-sm font-medium text-gray-900 text-right">
                                Filtrar previo a la fecha:
                            </label>
                            <input
                                wire:model.live="fecha"
                                type="date"
                                id="fecha"
                                value="{{ $this->fecha }}"
                                min="2000-01-01"
                                max="{{ date('Y-m-d', strtotime('+1 month')) }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                <span wire:loading wire:target="fecha" class="ml-2 text-gray-500">
                                    <svg class="animate-spin h-4 w-4 inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                </span>
                            {{-- <select 
                                class="border-cortvBorde border-1 rounded-md p-2 h-[40px] w-full mt-2 text-[16px]"
                            @foreach ($this->areas() as $area)
                                wire:model.live="areaFilter"
                                <option value="">Todos los cargos</option>
                                <option value="{{ $area }}">{{ $area }}</option>
                                @endforeach
                                
                            </select> --}}
                        </div>
                    </div>
                </div>

                <!--Tabla-->
                <div class="grid grid-cols-1 mx-[2%] xl:grid-cols-2 2xl:grid-cols-3">
                    @foreach($this->ordenes as $orden)
                        <livewire:cards.orden wire:key="orden-{{ $orden->id }}" :small="true" :orden="$orden" />
                    @endforeach

                </div>
    
                <div class="py-4 px-3 rounded-lg ">
                    <div class="flex ">
                        <div class="flex space-x-4 items-center mb-3">
                            <label class="w-32 text-sm font-medium text-gray-900">Por página</label>
                            <select
                                wire:model.live="perPage"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                <option value="3">3</option>
                                <option value="6">6</option>
                                <option value="9">9</option>
                                <option value="15">15</option>
                                <option value="30">30</option>
                            </select>
                        </div>
                    </div>
                    {{ $this->ordenes() }}
                </div>
            </div>

    </section>