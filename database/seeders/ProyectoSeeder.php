<?php

namespace Database\Seeders;

use App\Models\Proyecto;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProyectoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::query()->where('email', '=', 'test@example.com')->firstOrFail();

        Proyecto::create([
            'nombre' => 'Modernización Sistema Web',
            'fecha_inicio' => '2026-01-15',
            'estado' => 'En Proceso',
            'responsable' => 'Ana Martínez',
            'monto' => 4500000,
            'created_by' => $user->id,
        ]);
    }
}
