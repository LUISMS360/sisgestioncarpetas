<?php

namespace Database\Factories;

use App\Models\Fut;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Carpeta>
 */
class CarpetaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Esto tomará un ID existente de las tablas correspondientes
            'profesor_id' => User::where('rol', 'profesor')->inRandomOrder()->first()->id ?? User::factory(),
            'admin_id'    => User::where('rol', 'admin')->inRandomOrder()->first()->id ?? User::factory(),
            'fut_id'      => Fut::inRandomOrder()->first()->id ?? Fut::factory(),
        ];
    }
}
