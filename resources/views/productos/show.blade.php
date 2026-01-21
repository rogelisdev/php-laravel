<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle del Producto</title>
</head>
<body>

    <h1>Detalle del Producto</h1>

    {{-- Datos quemados --}}
    <p><strong>ID:</strong> 1</p>
    <p><strong>Nombre:</strong> Laptop HP</p>
    <p><strong>Precio:</strong> $1200</p>
    <p><strong>Stock:</strong> 15</p>

    <br>
    <a href="{{ route('productos.index') }}">Volver al listado</a>
    |
    <a href="{{ route('productos.edit', 1) }}">Editar Producto</a>

</body>
</html>
