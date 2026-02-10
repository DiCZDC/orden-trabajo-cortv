<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

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
