<?php

namespace Tests\Feature;

use App\Models\Proyecto;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProyectoApiTest extends TestCase
{
    use RefreshDatabase;

    private function payload(User $user): array
    {
        return [
            'nombre' => 'Proyecto API',
            'fecha_inicio' => '2026-08-29',
            'estado' => 'Pendiente',
            'responsable' => 'Responsable API',
            'monto' => 100000,
            'created_by' => $user->id,
        ];
    }

    public function test_it_lists_an_empty_array_when_there_are_no_projects(): void
    {
        $this->getJson('/api/proyectos')
            ->assertOk()
            ->assertExactJson([]);
    }

    public function test_it_creates_a_project_with_status_201(): void
    {
        $user = User::factory()->create();
        $payload = $this->payload($user);

        $this->postJson('/api/proyectos', $payload)
            ->assertCreated()
            ->assertJsonPath('nombre', $payload['nombre'])
            ->assertJsonPath('created_by', $user->id);

        $this->assertDatabaseHas('proyectos', $payload);
    }

    public function test_it_rejects_an_incomplete_project(): void
    {
        $this->postJson('/api/proyectos', [])
            ->assertUnprocessable()
            ->assertJsonValidationErrors([
                'nombre', 'fecha_inicio', 'estado', 'responsable', 'monto', 'created_by',
            ]);
    }

    public function test_it_shows_or_returns_404_for_a_project(): void
    {
        $user = User::factory()->create();
        $proyecto = Proyecto::create($this->payload($user));

        $this->getJson("/api/proyectos/{$proyecto->id}")
            ->assertOk()
            ->assertJsonPath('id', $proyecto->id);

        $this->getJson('/api/proyectos/999999')->assertNotFound();
    }

    public function test_it_updates_or_returns_404_for_a_project(): void
    {
        $user = User::factory()->create();
        $proyecto = Proyecto::create($this->payload($user));
        $updated = array_merge($this->payload($user), [
            'nombre' => 'Proyecto API actualizado',
            'estado' => 'Finalizado',
        ]);

        $this->putJson("/api/proyectos/{$proyecto->id}", $updated)
            ->assertStatus(201)
            ->assertJsonPath('nombre', 'Proyecto API actualizado');

        $this->assertDatabaseHas('proyectos', [
            'id' => $proyecto->id,
            'estado' => 'Finalizado',
        ]);

        $this->putJson('/api/proyectos/999999', $updated)->assertNotFound();
    }

    public function test_it_deletes_or_returns_404_for_a_project(): void
    {
        $user = User::factory()->create();
        $proyecto = Proyecto::create($this->payload($user));

        $this->deleteJson("/api/proyectos/{$proyecto->id}")
            ->assertNoContent();

        $this->assertDatabaseMissing('proyectos', ['id' => $proyecto->id]);
        $this->deleteJson('/api/proyectos/999999')->assertNotFound();
    }
}
