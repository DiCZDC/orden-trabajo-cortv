<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Orden extends Model
{
    /** @use HasFactory<\Database\Factories\OrdenFactory> */
    use HasFactory;

    protected $table = 'ordenes';

    protected $fillable = [
        'trabajador_id',
        'proyecto_id',
        'lugar_cita',
        'fecha_cita',
        'fecha_solicitud',
    ];

    protected $casts = [
        'fecha_cita' => 'date',
        'fecha_solicitud' => 'date',
    ];

    /**
     * Una orden pertenece a un trabajador
     */
    public function trabajador(): BelongsTo
    {
        return $this->belongsTo(Trabajador::class);
    }

    /**
     * Una orden necesita un proyecto
     */
    public function proyecto(): BelongsTo
    {
        return $this->belongsTo(Proyecto::class);
    }
    /*
        Filtro para busquedas
    */
    public function scopeSearch($query, $search)
    {
        if ($search) {
            return $query->where('lugar_cita', 'like', '%' . $search . '%')
                         ->orWhere('fecha_cita', 'like', '%' . $search . '%')
                         ->orWhere('fecha_solicitud', 'like', '%' . $search . '%');
        }
        return $query;
    }

}
