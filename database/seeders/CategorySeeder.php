<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = [
        ['name' => 'Electrónica'],
        ['name' => 'Ropa'],
        ['name' => 'Hogar'],
        ['name' => 'Alimentos'],
    ];

    foreach ($categorias as $categoria) {
        \App\Models\Category::create($categoria);
    }
    }
}
