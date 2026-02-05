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
                'productor_id' => 1,  
                'nombre' => 'Noticiero Matutino',
                //'actividad' => 'Transmisión en vivo',
                'locacion' => 'Estudio A',
            ],
            [
                'productor_id' => 2,  
                'nombre' => 'Documental Cultural',
                //'actividad' => 'Grabación',
                'locacion' => 'Centro Histórico',
            ],
            [
                'productor_id' => 3,  
                'nombre' => 'Programa Deportivo',
                //'actividad' => 'Producción',
                'locacion' => 'Estadio Municipal',
            ],
            [
                'productor_id' => 4,  
                'nombre' => 'Entrevistas Especiales',
                // 'actividad' => 'Grabación',
                'locacion' => 'Estudio B',
            ],
            [
                'productor_id' => 5,  
                'nombre' => 'Cobertura de Eventos',
                // 'actividad' => 'Transmisión en vivo',
                'locacion' => 'Exteriores',
            ],
        ];

        foreach ($proyectos as $proyecto) {
            Proyecto::create($proyecto);
        }
    }
}
