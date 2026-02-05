<?php

namespace Database\Seeders;

use App\Models\Empleado;
use App\Models\Productor;
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

            $turno = $data[1] != '.' ? $data[1]:null;
            $hora_entrada = $turno !== null ? $data[3]:null;
            $hora_salida = $turno !== null ? $data[4]:null;
            $trabajador = Trabajador::create([
                'nombre' => strtoupper($data[0]),                
            ]);

            if(strtoupper($data[2])!=='PRODUCTOR'){
                
                Empleado::create([
                'trabajador_id' => $trabajador->id,
                'turno' => $turno,
                'cargo' => strtoupper($data[2]),
                'hora_entrada' => $hora_entrada,
                'hora_salida' => $hora_salida,
            ]);
            }

            else{
                Productor::create([
                    'trabajador_id' => $trabajador->id,                   
                ]);
                
            }

        }

        fclose($file);


    }
}
