@extends('layouts.app')

@section('title', 'Bienvenido')

@section('content')
<body class="bg-gradient-to-r from-yellow-400 via-red-500 to-pink-500 min-h-screen flex items-center justify-center font-sans">

    <div class="bg-white rounded-3xl shadow-2xl p-12 max-w-lg text-center transform transition duration-500 hover:scale-105">
        <h1 class="text-5xl font-extrabold mb-6 text-pink-600 drop-shadow-lg">
            ¡Hola, Bienvenido!
        </h1>

        <p class="text-lg text-gray-700 mb-8">
            Administra tus productos fácilmente desde este panel dinámico y moderno.
        </p>

        <div class="flex flex-col sm:flex-row justify-center gap-6 mb-6">
            <a href="{{ route('productos.index') }}"
               class="px-8 py-4 rounded-xl bg-purple-500 hover:bg-purple-600 text-white font-bold shadow-lg transform hover:-translate-y-1 transition">
                Ver Productos
            </a>
            <a href="{{ route('productos.create') }}"
               class="px-8 py-4 rounded-xl bg-pink-500 hover:bg-pink-600 text-white font-bold shadow-lg transform hover:-translate-y-1 transition">
                Crear Producto
            </a>
        </div>

        <p class="text-sm text-gray-200 mt-4">
            Laravel + Tailwind CSS | Panel moderno
        </p>
    </div>

</body>
@endsection
