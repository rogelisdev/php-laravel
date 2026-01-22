@extends('layouts.app')

@section('title', 'Listado de Productos')

@section('content')

<div class="min-h-screen bg-gray-100 p-8">
    <div class="max-w-6xl mx-auto bg-white rounded-3xl shadow-2xl p-8">
        <h1 class="text-4xl font-extrabold mb-6 text-pink-600 drop-shadow-md">Listado de Productos</h1>

        <a href="{{ route('productos.create') }}"
           class="inline-block mb-6 px-6 py-3 rounded-xl bg-purple-500 hover:bg-purple-600 text-white font-bold shadow-lg transition transform hover:-translate-y-1">
            + Nuevo Producto
        </a>

        @if(session('success'))
            <div class="bg-green-200 text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-lg shadow-md overflow-hidden">
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
                    @foreach($productos as $producto)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="py-2 px-4 font-medium">{{ $producto->id }}</td>
                        <td class="py-2 px-4">{{ $producto->nombre }}</td>
                        <td class="py-2 px-4 font-semibold text-green-600">${{ $producto->precio }}</td>
                        <td class="py-2 px-4">{{ $producto->stock }}</td>
                        <td class="py-2 px-4 space-x-3">
                            <a href="{{ route('productos.show', $producto->id) }}"
                               class="text-blue-600 hover:underline font-semibold">Ver</a>
                            <a href="{{ route('productos.edit', $producto->id) }}"
                               class="text-yellow-600 hover:underline font-semibold">Editar</a>
                            <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" class="inline">
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
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
