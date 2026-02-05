<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Orden;
use App\Models\Empleado;
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

        // Obtener empleados y proyectos existentes
        $empleados = Empleado::all();
        $proyectos = Proyecto::all();

        // Verificar que existan datos necesarios
        if ($empleados->isEmpty() || $proyectos->isEmpty()) {
            $this->command->warn('No hay trabajadores o proyectos disponibles. Ejecute primero TrabajadorSeeder y ProyectoSeeder.');
            return;
        }

        // Crear órdenes de ejemplo
        $ordenes = [
            [
                'empleado_id' => $empleados->random()->id,
                'proyecto_id' => $proyectos->where('nombre', 'Noticiero Matutino')->first()?->id ?? $proyectos->first()->id,
                'lugar_cita' => 'Estudio A - Planta baja',
                'fecha_cita' => now()->addDays(1),
                'fecha_solicitud' => now(),
                'actividad' => 'Transmisión en vivo',
            ],
            [
                'empleado_id' => $empleados->random()->id,
                'proyecto_id' => $proyectos->where('nombre', 'Documental Cultural')->first()?->id ?? $proyectos->first()->id,
                'lugar_cita' => 'Centro Histórico - Plaza Principal',
                'fecha_cita' => now()->addDays(3),
                'fecha_solicitud' => now(),
                'actividad' => 'Grabación de escenas culturales',

            ],
            [
                'empleado_id' => $empleados->random()->id,
                'proyecto_id' => $proyectos->where('nombre', 'Programa Deportivo')->first()?->id ?? $proyectos->first()->id,
                'lugar_cita' => 'Estadio Municipal - Entrada principal',
                'fecha_cita' => now()->addDays(5),
                'fecha_solicitud' => now()->subDay(),
                'actividad' => 'Producción a gran escala de evento deportivo',    
            ],
        ];
        for ($i=0; $i < 20; $i++) { 
            $orden_noticiero = [
                'empleado_id' => $empleados->random()->id,
                'proyecto_id' => $proyectos->where('nombre', 'Noticiero Matutino')->first()?->id ?? $proyectos->first()->id,
                'lugar_cita' => 'Estudio A - Planta baja',
                'fecha_cita' => now()->addDays(1),
                'fecha_solicitud' => now(),
                'actividad' => 'Transmisión en vivo de noticias',
            ];
            Orden::create($orden_noticiero);
        }
        for  ($i=0; $i < 20; $i++) { 
            $orden_documental = [
                'empleado_id' => $empleados->random()->id,
                'proyecto_id' => $proyectos->where('nombre', 'Documental Cultural')->first()?->id ?? $proyectos->first()->id,
                'lugar_cita' => 'Centro Histórico - Plaza Principal',
                'fecha_cita' => now()->addDays(3),
                'fecha_solicitud' => now(),
                'actividad' => 'Grabación de escenas culturales',
            ];  
            Orden::create($orden_documental);
        }
        for  ($i=0; $i < 20; $i++) { 
            $orden_deportivo = [
                'empleado_id' => $empleados ->random()->id,
                'proyecto_id' => $proyectos->where('nombre', 'Programa Deportivo')->first()?->id ?? $proyectos->first()->id,
                'lugar_cita' => 'Estadio Municipal - Entrada principal',
                'fecha_cita' => now()->addDays(5),
                'fecha_solicitud' => now()->subDay(),
                'actividad' => 'Instalación de equipos para evento deportivo',

            ];
            Orden::create($orden_deportivo);
        }


        
    }
}
