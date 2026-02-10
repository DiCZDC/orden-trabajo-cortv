<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Productor extends Model
{
    protected $fillable = [
        'trabajador_id',
    ]; 

    /**
     * Un productor pertenece a un trabajador
     */
    public function trabajador()
    {
        return $this->belongsTo(Trabajador::class);
    }
}
