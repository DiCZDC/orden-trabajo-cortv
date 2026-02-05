<?php

namespace Database\Factories;

use App\Models\{
    Trabajador,
    Empleado,
    Proyecto,
};
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Orden>
 */
class OrdenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'empleado_id' => Empleado::factory(),
            'proyecto_id' => Proyecto::factory(),
            'lugar_cita' => fake()->address(),
            'fecha_cita' => fake()->dateTimeBetween('now', '+1 month'),
            'fecha_solicitud' => fake()->dateTimeBetween('-1 week', 'now'),
        ];
    }
}
