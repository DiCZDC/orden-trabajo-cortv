<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Orden;
use App\Models\Trabajador;
use App\Models\Proyecto;
use Illuminate\Support\Facades\Schema;

class OrdenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Orden::truncate();
        Schema::enableForeignKeyConstraints();

        // Obtener trabajadores y proyectos existentes
        $trabajadores = Trabajador::all();
        $proyectos = Proyecto::all();

        // Verificar que existan datos necesarios
        if ($trabajadores->isEmpty() || $proyectos->isEmpty()) {
            $this->command->warn('No hay trabajadores o proyectos disponibles. Ejecute primero TrabajadorSeeder y ProyectoSeeder.');
            return;
        }

        // Crear órdenes de ejemplo
        $ordenes = [
            [
                'trabajador_id' => $trabajadores->random()->id,
                'proyecto_id' => $proyectos->where('nombre', 'Noticiero Matutino')->first()?->id ?? $proyectos->first()->id,
                'lugar_cita' => 'Estudio A - Planta baja',
                'fecha_cita' => now()->addDays(1),
                'fecha_solicitud' => now(),
            ],
            [
                'trabajador_id' => $trabajadores->random()->id,
                'proyecto_id' => $proyectos->where('nombre', 'Documental Cultural')->first()?->id ?? $proyectos->first()->id,
                'lugar_cita' => 'Centro Histórico - Plaza Principal',
                'fecha_cita' => now()->addDays(3),
                'fecha_solicitud' => now(),
            ],
            [
                'trabajador_id' => $trabajadores->random()->id,
                'proyecto_id' => $proyectos->where('nombre', 'Programa Deportivo')->first()?->id ?? $proyectos->first()->id,
                'lugar_cita' => 'Estadio Municipal - Entrada principal',
                'fecha_cita' => now()->addDays(5),
                'fecha_solicitud' => now()->subDay(),
            ],
        ];
        for ($i=0; $i < 20; $i++) { 
            $orden_noticiero = [
                'trabajador_id' => $trabajadores->random()->id,
                'proyecto_id' => $proyectos->where('nombre', 'Noticiero Matutino')->first()?->id ?? $proyectos->first()->id,
                'lugar_cita' => 'Estudio A - Planta baja',
                'fecha_cita' => now()->addDays(1),
                'fecha_solicitud' => now(),
            ];
            Orden::create($orden_noticiero);
        }
        for  ($i=0; $i < 20; $i++) { 
            $orden_documental = [
                'trabajador_id' => $trabajadores->random()->id,
                'proyecto_id' => $proyectos->where('nombre', 'Documental Cultural')->first()?->id ?? $proyectos->first()->id,
                'lugar_cita' => 'Centro Histórico - Plaza Principal',
                'fecha_cita' => now()->addDays(3),
                'fecha_solicitud' => now(),
            ];
            Orden::create($orden_documental);
        }
        for  ($i=0; $i < 20; $i++) { 
            $orden_deportivo = [
                'trabajador_id' => $trabajadores->random()->id,
                'proyecto_id' => $proyectos->where('nombre', 'Programa Deportivo')->first()?->id ?? $proyectos->first()->id,
                'lugar_cita' => 'Estadio Municipal - Entrada principal',
                'fecha_cita' => now()->addDays(5),
                'fecha_solicitud' => now()->subDay(),
            ];
            Orden::create($orden_deportivo);
        }


        
    }
}
