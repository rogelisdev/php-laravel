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
    ) {}

public static function fromRequest(StoreProductoRequest|UpdateProductoRequest $request): self
{
    $data = $request->validated();

    return new self(
        nombre: $data['nombre'],
        precio: (float) $data['precio'], // conversión
        descripcion: $data['descripcion'] ?? null,
        stock: (int) $data['stock'],     // conversión
    );
}
    public function toArray(): array
    {
        return [
            'nombre' => $this->nombre,
            'precio' => $this->precio,
            'descripcion' => $this->descripcion,
            'stock' => $this->stock,
        ];
    }

}
