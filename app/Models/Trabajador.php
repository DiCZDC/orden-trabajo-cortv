<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    protected $casts = [
        'turno' => 'string',
        'hora_entrada' => 'datetime:H:i:s',
        'hora_salida' => 'datetime:H:i:s',
    ];

    /**
     * Un trabajador tiene muchas órdenes
     */
    public function ordenes(): HasMany
    {
        return $this->hasMany(Orden::class);
    }

    public function scopeSearch($query, $nombre)
    {
        if ($nombre) {
            return $query->where('nombre', 'like', '%' . $nombre . '%');
        }
    }
}
