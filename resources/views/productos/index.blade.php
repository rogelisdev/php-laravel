@extends('layouts.app')

@section('title', 'Listado de Productos')

@section('content')

<div class="min-h-screen bg-gray-100 flex flex-col">

    {{-- Navbar --}}
    <nav class="bg-purple-600 text-white shadow-md py-4 px-8 flex justify-between items-center">
        <h1 class="text-2xl font-bold">CRUD de Productos</h1>

        {{-- Enlaces de navegación --}}
        <div class="flex gap-4">
            <a href="{{ route('home.index') }}" class="hover:underline font-semibold transition">
                Inicio
            </a>
            <a href="{{ route('productos.index') }}" class="hover:underline font-semibold transition">
                Productos
            </a>
        </div>
    </nav>

    {{-- Contenido principal --}}
    <main class="flex-grow flex justify-center p-8">
        <div class="w-full max-w-6xl bg-white rounded-3xl shadow-2xl p-8 flex flex-col">

            <h1 class="text-4xl font-extrabold mb-6 text-pink-600 drop-shadow-md">Listado de Productos</h1>

            <a href="{{ route('productos.create') }}"
               class="inline-block mb-6 px-6 py-3 rounded-xl bg-purple-500 hover:bg-purple-600 text-white font-bold shadow-lg transition transform hover:-translate-y-1">
                + Nuevo Producto
            </a>

            {{-- Mensaje de éxito --}}
            @if(session('success'))
                <div class="bg-green-200 text-green-800 p-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Contenedor fijo para la tabla --}}
            <div class="overflow-y-hidden">
                <table class="min-w-full bg-white rounded-lg shadow-md">
                    <thead class="bg-gray-200 text-gray-700">
                        <tr>
                            <th class="py-3 px-4 text-left">ID</th>
                            <th class="py-3 px-4 text-left">Nombre</th>
                            <th class="py-3 px-4 text-left">Precio</th>
                            <th class="py-3 px-4 text-left">Stock</th>
                            <th class="py-3 px-4 text-left">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($productos as $producto)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="py-4 px-4 font-medium">{{ $producto->id }}</td>
                                <td class="py-4 px-4">{{ $producto->nombre }}</td>
                                <td class="py-4 px-4 font-semibold text-green-600">${{ number_format($producto->precio, 2) }}</td>
                                <td class="py-4 px-4">{{ $producto->stock }}</td>
                                <td class="py-4 px-4 space-x-3">
                                    <a href="{{ route('productos.show', $producto) }}" class="text-blue-600 hover:underline font-semibold">Ver</a>
                                    <a href="{{ route('productos.edit', $producto) }}" class="text-yellow-600 hover:underline font-semibold">Editar</a>
                                    <form action="{{ route('productos.destroy', $producto) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="text-red-600 hover:underline font-semibold"
                                                onclick="return confirm('¿Eliminar este producto?')">
                                            Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-4 px-4 text-center text-gray-500">
                                    No hay productos disponibles.
                                </td>
                            </tr>
                        @endforelse

                        {{-- Relleno para mantener altura fija de 5 filas --}}
                        @for($i = $productos->count(); $i < 5; $i++)
                            <tr class="border-b">
                                <td class="py-4 px-4">&nbsp;</td>
                                <td class="py-4 px-4"></td>
                                <td class="py-4 px-4"></td>
                                <td class="py-4 px-4"></td>
                                <td class="py-4 px-4"></td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>

            {{-- Paginación fija --}}
            <div class="mt-6 flex justify-center">
                {{ $productos->links() }}
            </div>
        </div>
    </main>

    {{-- Footer --}}
    <footer class="bg-gray-200 text-gray-700 py-4 text-center">
        Practicando
    </footer>

</div>

@endsection
