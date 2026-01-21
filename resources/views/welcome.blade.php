<body class="bg-welcome-gradient flex items-center justify-center min-h-screen font-sans">

    <div class="card-welcome">
        <h1 class="text-3xl font-bold mb-4 text-gradient">
            ¡Bienvenido a {{ config('app.name', 'Laravel') }}!
        </h1>

        <p class="mb-6 text-gray-soft">Administra tus productos fácilmente desde aquí.</p>

        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="{{ route('productos.index') }}" class="btn-blue">
                Ver Productos
            </a>
            <a href="{{ route('productos.create') }}" class="btn-green">
                Crear Producto
            </a>
        </div>

        <p class="text-footer">Laravel + Tailwind CSS</p>
    </div>

</body>
