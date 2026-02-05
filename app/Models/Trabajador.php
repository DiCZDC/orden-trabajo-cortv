<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Trabajador extends Model
{
    /** @use HasFactory<\Database\Factories\TrabajadorFactory> */
    use HasFactory;

    protected $fillable = [
        'nombre',
    ];


    /**
     * Un trabajador puede tener un empleado
     */
    public function empleado(): HasOne
    {
        return $this->hasOne(Empleado::class);
    }
    /**
     * Un trabajador puede tener un productor
     */
    public function productor(): HasOne
    {
        return $this->hasOne(Productor::class);
    }

    public function scopeSearch($query, $nombre)
    {
        if ($nombre) {
            return $query->where('nombre', 'like', '%' . $nombre . '%');
        }
    }
}
