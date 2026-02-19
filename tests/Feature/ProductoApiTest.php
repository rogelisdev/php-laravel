<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Producto;
use App\Models\Category;
use App\Models\User;


use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductoApiTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_list_productos()
    {
        Producto::factory()->count(3)->create();

        $response = $this->getJson('/api/productos');

        $response->assertStatus(200)
                ->assertJsonCount(3);
    }

    /** @test */
    public function it_can_create_producto()
{
    $user = \App\Models\User::factory()->create();
    $this->actingAs($user);

    $category = \App\Models\Category::factory()->create();

    $response = $this->postJson('/api/productos', [
        'nombre' => 'Laptop',
        'precio' => 1500,
        'stock' => 10,
        'category_id' => $category->id,
    ]);

    $response->assertStatus(201);
}


    /** @test */
    public function it_can_show_producto()
    {
        $producto = Producto::factory()->create();

        $response = $this->getJson("/api/productos/{$producto->id}");

        $response->assertStatus(200)
                ->assertJsonFragment([
                    'id' => $producto->id
                ]);
    }

    /** @test */
    public function it_can_update_producto()
    {
        $producto = Producto::factory()->create();

        $response = $this->putJson("/api/productos/{$producto->id}", [
            'nombre' => 'Nuevo Nombre',
            'precio' => 2000
        ]);

        $response->assertStatus(200)
                ->assertJsonFragment([
                    'nombre' => 'Nuevo Nombre'
                ]);
    }

    /** @test */
    public function it_can_delete_producto()
    {
        $producto = Producto::factory()->create();

        $response = $this->deleteJson("/api/productos/{$producto->id}");

        $response->assertStatus(200);

        $this->assertDatabaseMissing('productos', [
            'id' => $producto->id
        ]);
    }
}
