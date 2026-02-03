<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Proyecto>
 */
class ProyectoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => fake()->company(),
            'actividad' => fake()->randomElement(['Grabación', 'Transmisión en vivo', 'Edición', 'Producción', 'Post-producción']),
            'locacion' => fake()->address(),
        ];
    }
}
