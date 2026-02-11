<?php

namespace Database\Seeders;

use App\Models\Carpeta;
use Database\Factories\CarpetaFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarpetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Carpeta::factory()->count(100)->create();
    }
}
