<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'nombre' => fake()->word(),
        'precio' => fake()->numberBetween(100, 5000),
        'stock' => 10,
        'category_id' => \App\Models\Category::factory(),
        'user_id' => \App\Models\User::factory(),
    ];
    }
}
