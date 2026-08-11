<?php

namespace Tests\Feature;

use App\Models\Proyecto;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_is_redirected_to_login_from_home(): void
    {
        $response = $this->get('/');

        $response->assertRedirect(route('login'));
    }

    public function test_guest_is_redirected_to_login_from_projects(): void
    {
        $response = $this->get('/proyectos');

        $response->assertRedirect(route('login'));
    }

    public function test_user_can_register_with_a_hashed_password(): void
    {
        $response = $this->post(route('register.store'), [
            'name' => 'Usuario de Prueba',
            'email' => 'usuario@example.com',
            'password' => 'password-segura',
            'password_confirmation' => 'password-segura',
        ]);

        $user = User::where('email', 'usuario@example.com')->first();

        $response->assertRedirect(route('proyectos.index'));
        $this->assertNotNull($user);
        $this->assertNotSame('password-segura', $user->password);
        $this->assertTrue(Hash::check('password-segura', $user->password));
        $this->assertAuthenticatedAs($user);
    }

    public function test_user_can_log_in_with_valid_credentials(): void
    {
        $user = User::factory()->create([
            'password' => Hash::make('password-segura'),
        ]);

        $response = $this->post(route('login.store'), [
            'email' => $user->email,
            'password' => 'password-segura',
        ]);

        $response->assertRedirect(route('proyectos.index'));
        $this->assertAuthenticatedAs($user);
    }

    public function test_invalid_credentials_are_rejected(): void
    {
        $user = User::factory()->create([
            'password' => Hash::make('password-segura'),
        ]);

        $response = $this->from(route('login'))->post(route('login.store'), [
            'email' => $user->email,
            'password' => 'password-incorrecta',
        ]);

        $response->assertRedirect(route('login'));
        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    public function test_authenticated_user_can_create_a_project_associated_to_their_id(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post(route('proyectos.store'), [
            'nombre' => 'Proyecto de Prueba',
            'fecha_inicio' => '2026-08-10',
            'estado' => 'En Proceso',
            'responsable' => 'Responsable de Prueba',
            'monto' => 150000,
        ]);

        $response->assertRedirect(route('proyectos.index'));
        $this->assertDatabaseHas('proyectos', [
            'nombre' => 'Proyecto de Prueba',
            'created_by' => $user->id,
        ]);
        $this->assertInstanceOf(Proyecto::class, Proyecto::first());
    }

    public function test_logout_invalidates_the_authenticated_session(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post(route('logout'));

        $response->assertRedirect(route('login'));
        $this->assertGuest();
    }
}
