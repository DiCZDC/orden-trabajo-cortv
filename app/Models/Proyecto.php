<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Proyecto extends Model
{
    /** @use HasFactory<\Database\Factories\ProyectoFactory> */
    use HasFactory;

    protected $fillable = [
        'nombre',
        'actividad',
        'locacion',
    ];

    /**
     * Un proyecto tiene muchas órdenes
     */
    public function ordenes(): HasMany
    {
        return $this->hasMany(Orden::class);
    }
    /**
     * Un proyecto pertenece a un productor
     */
    public function productor()
    {
        return $this->belongsTo(Productor::class);
    }
}
