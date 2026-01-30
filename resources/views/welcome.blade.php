<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido | Gestión de Productos</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800">

<!-- Navbar -->
<header class="bg-white shadow">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center h-16">
        <h1 class="text-2xl font-bold text-pink-600">MiPanel</h1>
        <nav class="space-x-4">
            <a href="{{ route('login') }}" class="text-gray-700 hover:text-pink-600 font-medium">Iniciar Sesión</a>
            <a href="{{ route('register') }}" class="text-gray-700 hover:text-pink-600 font-medium">Registrarse</a>
        </nav>
    </div>
</header>

<!-- Hero / Descripción -->
<section class="py-20 bg-gradient-to-r from-pink-100 to-purple-100">
    <div class="max-w-4xl mx-auto text-center px-4">
        <h2 class="text-5xl font-extrabold mb-6 text-pink-600">Gestiona tus productos fácilmente</h2>
        <p class="text-lg text-gray-700 mb-8">
            Bienvenido a MiPanel, la herramienta sencilla para administrar tus productos.
            Regístrate o inicia sesión para acceder a tu panel y controlar productos, usuarios y roles según tu nivel de acceso.
        </p>
        </div>
    </div>
</section>

<!-- Características -->
<section class="py-20">
    <div class="max-w-6xl mx-auto px-4 grid md:grid-cols-3 gap-8 text-center">
        <div class="bg-white shadow-lg rounded-xl p-8">
            <h3 class="text-2xl font-semibold mb-4 text-pink-600">Control de Productos</h3>
            <p class="text-gray-600">Agrega, edita y elimina productos de manera rápida y sencilla.</p>
        </div>
        <div class="bg-white shadow-lg rounded-xl p-8">
            <h3 class="text-2xl font-semibold mb-4 text-pink-600">Gestión de Usuarios</h3>
            <p class="text-gray-600">Administra usuarios y asigna roles según su nivel de acceso.</p>
        </div>
        <div class="bg-white shadow-lg rounded-xl p-8">
            <h3 class="text-2xl font-semibold mb-4 text-pink-600">Acceso Seguro</h3>
            <p class="text-gray-600">Inicia sesión de forma segura y protege la información de tu panel.</p>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-white shadow mt-20">
    <div class="max-w-7xl mx-auto px-4 py-6 text-center text-gray-600">
        &copy; 2026 MiPanel. Todos los derechos reservados.
    </div>
</footer>

</body>
</html>
