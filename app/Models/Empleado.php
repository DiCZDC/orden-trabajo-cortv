<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
     protected $fillable = [
        'trabajador_id',   
        'turno',
        'cargo',
        'hora_entrada',
        'hora_salida',
    ];
    protected $casts = [
    'turno' => 'string',
    'hora_entrada' => 'datetime:H:i:s',
    'hora_salida' => 'datetime:H:i:s',
    ];

    /**
     * Un empleado pertenece a un trabajador
     */
    public function trabajador()
    {
        return $this->belongsTo(Trabajador::class);
    }



}
