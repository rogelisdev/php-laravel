@extends('layouts.app')

@section('title', 'Detalle del Producto')

@section('content')

<div class="min-h-screen bg-gray-100 flex items-center justify-center p-8">
    <div class="w-full max-w-lg bg-white rounded-3xl shadow-2xl p-8">
        <h1 class="text-3xl font-extrabold mb-6 text-blue-600 drop-shadow-md">Detalle del Producto</h1>

        <div class="space-y-3 text-gray-700">
            <p><span class="font-bold text-gray-800">ID:</span> {{ $producto->id }}</p>
            <p><span class="font-bold text-gray-800">Nombre:</span> {{ $producto->nombre }}</p>
            <p><span class="font-bold text-gray-800">Descripción:</span> {{ $producto->descripcion ?? 'N/A' }}</p>
            <p><span class="font-bold text-gray-800">Precio:</span> ${{ $producto->precio }}</p>
            <p><span class="font-bold text-gray-800">Stock:</span> {{ $producto->stock }}</p>
        </div>

        <div class="mt-6 flex gap-4">
            <a href="{{ route('productos.index') }}"
               class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-xl shadow-lg transition transform hover:-translate-y-1">
               Volver al listado
            </a>
            <a href="{{ route('productos.edit', $producto->id) }}"
               class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded-xl shadow-lg transition transform hover:-translate-y-1">
               Editar Producto
            </a>
        </div>
    </div>
</div>

@endsection
