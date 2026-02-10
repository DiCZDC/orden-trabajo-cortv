<?php

use Livewire\Component;
use Livewire\Attributes\Computed;
use App\Models\{
    Trabajador,Empleado
};
use Livewire\Attributes\Validate;

new class extends Component
{
    #[Validate('required',message: 'Ingrese el nombre del nuevo empleado')]
    public $nombre_empleado = '';

    #[Validate('required',message: 'Ingrese el cargo del nuevo trabajador')]
    public $cargo = '';
    #[Validate('required',message: 'Ingrese el turno del nuevo trabajador')]
    public $turno = '';

    public $hora_entrada = '';
    public $hora_salida = '';

    protected function rules()
    {
        $rules = [
            'nombre_empleado' => 'required',
            'cargo' => 'required',
            'turno' => 'required',
        ];

        if (strtoupper($this->turno) !== 'DESCANSERO') {
            $rules['hora_entrada'] = 'required|date_format:H:i|before:hora_salida';
            $rules['hora_salida'] = 'required|date_format:H:i|after:hora_entrada';
        } else {
            $rules['hora_entrada'] = 'nullable';
            $rules['hora_salida'] = 'nullable';
        }

        return $rules;
    }

    protected $messages = [
        'nombre_empleado.required' => 'Ingrese el nombre del nuevo empleado',
        'cargo.required' => 'Ingrese el cargo del nuevo trabajador',
        'turno.required' => 'Ingrese el turno del nuevo trabajador',
        'hora_entrada.required' => 'Ingrese la hora de entrada del nuevo trabajador',
        'hora_entrada.before' => 'La hora de entrada debe ser anterior a la hora de salida',
        'hora_salida.required' => 'Ingrese la hora de salida del nuevo trabajador',
        'hora_salida.after' => 'La hora de salida debe ser posterior a la hora de entrada',
    ];

    public function updatedTurno($value)
    {
        if (strtoupper($value) === 'DESCANSERO') {
            $this->reset(['hora_entrada', 'hora_salida']);
            $this->resetValidation(['hora_entrada', 'hora_salida']);
        }
    }

    public function save(){
        $this->validate();

        Trabajador::create([
            'nombre' => $this->nombre_empleado,
        ]);

        $id_empleado = Trabajador::latest()->first()->id;
        
        Empleado::create([
            'trabajador_id' => $id_empleado,
            'cargo' => $this->cargo,
            'turno' => $this->turno,
            'hora_entrada' => $this->hora_entrada,
            'hora_salida' => $this->hora_salida,
        ]);
        

        $this->reset();

        return redirect()->route('personal.index')->with('success', 'Trabajador nuevo registrado.');   

    }

    #[Computed()]
    public function cargos(){
        return Empleado::all()->pluck('cargo')->unique();
    }


    public function render()
    {
        return view('components.forms.⚡trabajador.trabajador');
    }

};