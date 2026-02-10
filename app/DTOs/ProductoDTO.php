<?php

namespace App\DTOs;

use App\Http\Requests\StoreProductoRequest;
use App\Http\Requests\UpdateProductoRequest;

class ProductoDTO
{
    public function __construct(
        public readonly string $nombre,
        public readonly float $precio,
        public readonly ?string $descripcion,
        public readonly int $stock,
        public readonly int $category_id, // 1. Agregado al constructor
        public readonly mixed $imagen = null,
    ) {}

    public static function fromRequest(StoreProductoRequest|UpdateProductoRequest $request): self
    {
        $data = $request->validated();

        return new self(
            nombre: $data['nombre'],
            precio: (float) $data['precio'],
            descripcion: $data['descripcion'] ?? null,
            stock: (int) $data['stock'],
            // Aseguramos que siempre haya un valor o lanzamos una excepción clara
            category_id: (int) ($data['category_id'] ?? $request->category_id), // 2. Obtenido del request validado
            imagen: $data['imagen'] ?? null, // Usaremos esta llave temporal
        );
    }

    public function toArray(): array
    {
        return [
            'nombre' => $this->nombre,
            'precio' => $this->precio,
            'descripcion' => $this->descripcion,
            'stock' => $this->stock,
            'category_id' => $this->category_id, // 3. Incluido en el array para el Model::create
            'imagen' => $this->imagen, // Y también la imagen
        ];
    }
}
