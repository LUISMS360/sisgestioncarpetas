<?php

namespace Database\Seeders;

use App\Models\Fut;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('es_PE'); // Localizado para Perú
        $user = User::first() ?? User::factory()->create();

        for ($i = 0; $i < 200; $i++) {
            Fut::create([
                'resumen_solicitud'     => $faker->sentence(4),
                'nombres_apellidos'     => $faker->name(),
                'datos_del_solicitante' => $faker->name(),
                'documento_identidad'   => $faker->dni(), // Faker tiene soporte para DNI peruano
                'telefonos'             => $faker->phoneNumber(),
                'correo'                => $faker->safeEmail(),
                'domicilio'             => $faker->address(),
                'cargo_actual'          => $faker->randomElement(['estudiante', 'egresado', 'otros']),
                'carrera_profesional'   => 'Desarrollo de Sistemas',
                'anio_egresado'         => $faker->year(),
                'fundamentacion_pedido' => $faker->paragraph(),
                'documentos_adjuntados' => 'Voucher-' . $faker->randomNumber(5),
                'fecha'                 => $faker->dateTimeBetween('-1 month', 'now'),
                'firma'                 => 'firma_ejemplo.png',
                'turno'                 => $faker->randomElement(['mañana', 'noche']),
                'ciclo'                 => $faker->randomElement(['I', 'II', 'III', 'IV', 'V', 'VI']),
                'user_id'               => $user->id,
                // 'dirigida' y 'lugar' se llenarán solos por los $attributes de tu modelo
            ]);
        }
    }
}
