<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
         $user = User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => Hash::make('password')
            ]
        );

        // Orden de ejecución importante:
        // 1. Trabajadores (no tienen dependencias)
        // 2. Proyectos (no tienen dependencias)
        // 3. Ordenes (depende de Trabajadores y Proyectos)
        $this->call([
            TrabajadorSeeder::class,
            // ProyectoSeeder::class,
            // OrdenSeeder::class,
        ]);
    }
}
