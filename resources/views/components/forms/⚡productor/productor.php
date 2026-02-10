<?php

use Livewire\Component;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use App\Models\{
    Trabajador,
    Productor
};

new class extends Component
{
    #[Validate( 'required', 'string', 'max:255',message:'El nombre del productor es requerido y debe ser una cadena de texto con un máximo de 255 caracteres.s')]   
    public $nombre_productor;

    public function save()
    {
        $this->validate();

        // Crear un nuevo productor
        $trabajador =Trabajador::create([
            'nombre' => strtoupper($this->nombre_productor),
        ]);
        Productor::create([
            'trabajador_id' => $trabajador->id,
        ]);

        // Limpiar el campo después de guardar
        $this->reset('nombre_productor');
        return redirect()->route('productores.index')->with('success', 'Productor registrado exitosamente.');
    }
};