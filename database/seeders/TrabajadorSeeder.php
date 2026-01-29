<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Trabajador;
use Illuminate\Support\Facades\Schema;

class TrabajadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $path = database_path('data/trabajadores.csv');

        Schema::disableForeignKeyConstraints();
        Trabajador::truncate();
        Schema::enableForeignKeyConstraints();
        
        $file = fopen($path, 'r');
        $isHeader = true;
        while (($data = fgetcsv($file, 1000, ',')) !== FALSE) {
            if ($isHeader) {
                $isHeader = false;
                continue;
            }

            Trabajador::create([
                'nombre' => $data[0],
                'turno' => $data[1],
                'cargo' => $data[2],
                'hora_entrada' => $data[3],
                'hora_salida' => $data[4],
            ]);
        }

        fclose($file);


    }
}
