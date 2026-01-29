<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trabajador extends Model
{
    /** @use HasFactory<\Database\Factories\TrabajadorFactory> */
    use HasFactory;
    protected $fillable = [
        'nombre',
        'turno',
        'cargo',
        'hora_entrada',
        'hora_salida',
    ];

}
