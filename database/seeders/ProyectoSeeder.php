<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Proyecto;
use Illuminate\Support\Facades\Schema;

class ProyectoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Proyecto::truncate();
        Schema::enableForeignKeyConstraints();

        // Crear algunos proyectos de ejemplo
        $proyectos = [
            [
                'nombre' => 'Noticiero Matutino',
                'actividad' => 'Transmisión en vivo',
                'locacion' => 'Estudio A',
            ],
            [
                'nombre' => 'Documental Cultural',
                'actividad' => 'Grabación',
                'locacion' => 'Centro Histórico',
            ],
            [
                'nombre' => 'Programa Deportivo',
                'actividad' => 'Producción',
                'locacion' => 'Estadio Municipal',
            ],
            [
                'nombre' => 'Entrevistas Especiales',
                'actividad' => 'Grabación',
                'locacion' => 'Estudio B',
            ],
            [
                'nombre' => 'Cobertura de Eventos',
                'actividad' => 'Transmisión en vivo',
                'locacion' => 'Exteriores',
            ],
        ];

        foreach ($proyectos as $proyecto) {
            Proyecto::create($proyecto);
        }
    }
}
