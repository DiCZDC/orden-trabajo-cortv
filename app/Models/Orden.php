<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\{
    Empleado,
    Proyecto
};
class Orden extends Model
{
    /** @use HasFactory<\Database\Factories\OrdenFactory> */
    use HasFactory;

    protected $table = 'ordenes';

    protected $fillable = [
        'empleado_id',
        'proyecto_id',
        'actividad',
        'lugar_cita',
        'fecha_cita',
        'fecha_solicitud',
        'hora_llamado',
        'hora_primer_tiro',
        'hora_catering',
        'hora_reinicio',
        'hora_ultimo_tiro',
        'observaciones',
    ];

    protected $casts = [
        'fecha_cita' => 'date',
        'fecha_solicitud' => 'date',
    ];

    /**
     * Una orden pertenece a un empleado
     */
    public function empleado(): BelongsTo
    {
        return $this->belongsTo(Empleado::class);
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
        return $query->where('lugar_cita', 'like', '%' . $search . '%')
            ->orWhere('fecha_cita', 'like', '%' . $search . '%')
            ->orWhere('fecha_solicitud', 'like', '%' . $search . '%')
            ;
    }
    public function save_data(){
        session()->put('ultima_orden',[
            //Datos del trabajador
            'nombre' => $this->empleado->trabajador->nombre,
            'cargo' => $this->empleado->cargo,
            'contrato' => true,
            'area' => 'TV',
            //horario empleado
            'horario_habitual' => $this->fecha_cita->isWeekend() ? '___' : $this->empleado->hora_entrada->format('H:i') . ' - ' . $this->empleado->hora_salida->format('H:i').' hrs',
            //Datos de la orden
            'fecha_solicitud' => $this->fecha_solicitud->format('Y-m-d'),
            'fecha_llamado' => $this->fecha_cita->format('Y-m-d'),
            'hora_llamado' => $this->hora_llamado != '' ? $this->hora_llamado.' hrs': '___',
            //Datos del proyecto
            'lugar_cita' => $this->lugar_cita,
            'locacion' => $this->proyecto->locacion,
            'actividades' => $this->actividad,
            'director_proyecto' => 'PENDEJO DANIEL',
            'nombre_proyecto' => $this->proyecto->nombre,
            //Horarios de la orden
            'hora_primer_tiro' => $this->hora_primer_tiro != '' ? $this->hora_primer_tiro.' hrs': '___',
            'hora_catering' => $this->hora_catering != '' ? $this->hora_catering.' hrs': '___',
            'hora_reinicio' => $this->hora_reinicio != '' ? $this->hora_reinicio.' hrs': '___',
            'hora_ultimo_tiro' => $this->hora_ultimo_tiro != '' ? $this->hora_ultimo_tiro.' hrs': '___',
            //Observaciones
            'observaciones' => $this->observaciones,
            //Fin de semana
            'fin_semana' => $this->fin_semana,
            //Datos adicionales
            'productor' => $this->proyecto->productor->trabajador->nombre,
            'operaciones_nombre' => 'ING. EDWIN MARTÍNEZ CRUZ',
            'director' => 'LIC. DIANA ISIS MOLINA DOMINGUEZ',
        ]);
    }

}
