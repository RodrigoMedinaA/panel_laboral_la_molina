<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Carrera;

class CarreraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $carreras = [
            ['nombre' => 'Ingeniería de Sistemas'],
            ['nombre' => 'Administración de Empresas'],
            ['nombre' => 'Psicología'],
            ['nombre' => 'Medicina'],
            ['nombre' => 'Derecho'],
        ];

        foreach ($carreras as $carrera) {
            Carrera::firstOrCreate(
                ['nombre' => $carrera['nombre']]
            );
        }
    }
}
