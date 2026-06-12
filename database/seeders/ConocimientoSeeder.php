<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Conocimiento;

class ConocimientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $conocimientos = [
            ['nombre' => 'Programación', 'grupo' => 'Tecnología'],
            ['nombre' => 'Diseño Gráfico', 'grupo' => 'Creatividad'],
            ['nombre' => 'Marketing Digital', 'grupo' => 'Marketing'],
            ['nombre' => 'Gestión de Proyectos', 'grupo' => 'Gestión'],
            ['nombre' => 'Análisis de Datos', 'grupo' => 'Datos'],
        ];

        foreach ($conocimientos as $conocimiento) {
            Conocimiento::firstOrCreate(
                ['nombre' => $conocimiento['nombre']],
                ['grupo' => $conocimiento['grupo']]
            );
        }
    }
}
