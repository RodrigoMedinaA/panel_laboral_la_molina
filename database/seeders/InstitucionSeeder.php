<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Institucion;

class InstitucionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $instituciones = [
            ['nombre' => 'Universidad Nacional Mayor de San Marcos'],
            ['nombre' => 'Pontificia Universidad Católica del Perú'],
            ['nombre' => 'Universidad Peruana Cayetano Heredia'],
            ['nombre' => 'Universidad de Lima'],
            ['nombre' => 'Universidad del Pacífico'],
        ];

        foreach ($instituciones as $institucion) {
            Institucion::firstOrCreate(
                ['nombre' => $institucion['nombre']]
            );
        }
    }
}
