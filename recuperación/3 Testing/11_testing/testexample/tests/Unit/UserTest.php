<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     */
   /* public function test_example(): void
    {
        $this->assertTrue(true);
    }*/

    public function test_index_returns_all_users()
{
    // Preparamos el entorno: crear usuarios de prueba
    \App\Models\User::factory(3)->create();

    // Llamamos a la ruta index
    $response = $this->getJson('/api/users');

    // Verificamos que el status sea 200
    $response->assertStatus(200);

    // Verificamos que haya 3 usuarios en la respuesta
    $response->assertJsonCount(3);
}

public function test_detail_returns_user_if_exists()
{
    $user = \App\Models\User::factory()->create(['name' => 'Antonio']);

    $response = $this->getJson("/api/users/{$user->id}");

    $response->assertStatus(200)
             ->assertJson([
                 'id' => $user->id,
                 'name' => 'Antonio',
             ]);
}

public function test_detail_returns_404_if_user_not_found()
{
    $response = $this->getJson('/api/users/999'); // ID que no existe

    $response->assertStatus(404)
             ->assertJson([
                 'error' => 'User not found',
             ]);
}


}
