<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar producto</title>
</head>
<body>

    <h1>Editar producto</h1>

    <form>
        <label>Nombre del producto</label><br>
        <input type="text" value="Laptop HP - Modelo 2026"><br><br>

        <label>Precio</label><br>
        <input type="number" value="1300"><br><br>

        <label>Stock</label><br>
        <input type="number" value="10"><br><br>

        <button type="submit">Actualizar producto</button>
    </form>

    <br>
    <a href="{{ route('productos.index') }}">Volver al listado</a>

</body>
</html>
