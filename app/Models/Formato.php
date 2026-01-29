<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formato extends Model
{
    /** @use HasFactory<\Database\Factories\FormatoFactory> */
    use HasFactory;

    protected $fillable = [
        'actividad',
        'locacion',
        'lugar_cita',
        'fecha_cita',
        'proyecto',
    ];
}
