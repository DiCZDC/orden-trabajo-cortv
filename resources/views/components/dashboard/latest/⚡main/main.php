<?php

use Livewire\Component;
use App\Models\{
    Proyecto,
    Orden,
};
use Illuminate\Support\Computed;
new class extends Component
{
    public $background = false;
    //tipo 1 = proyectos, tipo 2 = ordenes, tipo = 3 Trabajadores
    public $tipo = 1; 
    //Titulos
    private $titles = [
        1 => 'Últimos Proyectos',
        2 => 'Últimas Órdenes Generadas',        
    ];   
    #[Computed()]
    public function obtenerProyectosRecientes() {
        return Proyecto::orderBy('created_at', 'desc')->limit(3)->get();
    }
    #[Computed()]
    public function ordenes(){
        return Orden::orderBy('created_at', 'desc')->limit(3)->get();
    }
    
    public function mount($tipo, $background){
        $this->tipo = $tipo;
        if($this->tipo == 1){
            $this->background = true;
        }
    }
};
    
