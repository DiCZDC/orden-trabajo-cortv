<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\{
    Proyecto,
    Productor
    };
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

        // Crear algunos proyectos de base
        $proyectos = [
            [
                'productor_id' => 1,  
                'nombre' => 'Cubreturno Matutino',
                'locacion' => 'Instalaciones de CORTV',
            ],
            [
                'productor_id' => 1,  
                'nombre' => 'Cubreturno Vespertino',
                'locacion' => 'Instalaciones de CORTV',
            ],
            [
                'productor_id' => 1,  
                'nombre' => 'Cubreturno Sabatino',
                'locacion' => 'Instalaciones de CORTV',
            ],
            [
                'productor_id' => 1,  
                'nombre' => 'Cubreturno Dominical',
                'locacion' => 'Instalaciones de CORTV',
            ]
        ];

        foreach ($proyectos as $proyecto) {
            Proyecto::create($proyecto);
        }
    }
}
