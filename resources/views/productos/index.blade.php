<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Productos</title>
</head>
<body>

    <h1>Listado de productos</h1>

    <a href="{{ route('productos.create') }}">+ Nuevo Producto</a>
    <br><br>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            {{-- Datos quemados para practicar --}}
            <tr>
                <td>1</td>
                <td>Laptop HP</td>
                <td>$1200</td>
                <td>15</td>
                <td>
                    <a href="{{ route('productos.show', 1) }}">Ver</a> |
                    <a href="{{ route('productos.edit', 1) }}">Editar</a> |
                    <a href="#">Eliminar</a>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Mouse Logitech</td>
                <td>$35</td>
                <td>50</td>
                <td>
                    <a href="{{ route('productos.show', 2) }}">Ver</a> |
                    <a href="{{ route('productos.edit', 2) }}">Editar</a> |
                    <a href="#">Eliminar</a>
                </td>
            </tr>
            <tr>
                <td>3</td>
                <td>Monitor Samsung</td>
                <td>$250</td>
                <td>20</td>
                <td>
                    <a href="{{ route('productos.show', 3) }}">Ver</a> |
                    <a href="{{ route('productos.edit', 3) }}">Editar</a> |
                    <a href="#">Eliminar</a>
                </td>
            </tr>
        </tbody>
    </table>

</body>
</html>
