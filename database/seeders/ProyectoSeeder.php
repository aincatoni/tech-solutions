<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProyectoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Proyecto::create([
            'nombre' => 'Modernización Sistema Web',
            'fecha_inicio' => '2026-01-15',
            'estado' => 'En Proceso',
            'responsable' => 'Ana Martínez',
            'monto' => 4500000,
        ]);
    }
}
