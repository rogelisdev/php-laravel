@extends('layouts.app')

@section('title', 'Editar Producto')

@section('content')

<div class="min-h-screen bg-gray-100 flex items-center justify-center p-8">
    <div class="w-full max-w-lg bg-white rounded-3xl shadow-2xl p-8">
        <h1 class="text-3xl font-extrabold mb-6 text-yellow-600 drop-shadow-md">Editar Producto</h1>

        @if($errors->any())
            <div class="bg-red-200 text-red-800 p-3 rounded mb-4">
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('productos.update', $producto->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block font-bold mb-1">Nombre del producto</label>
                <input type="text" name="nombre" value="{{ old('nombre', $producto->nombre) }}"
                       class="w-full border rounded-xl px-4 py-2 shadow-sm focus:ring-2 focus:ring-yellow-400 focus:outline-none">
            </div>

            <div>
                <label class="block font-bold mb-1">Descripción</label>
                <textarea name="descripcion"
                          class="w-full border rounded-xl px-4 py-2 shadow-sm focus:ring-2 focus:ring-yellow-400 focus:outline-none"
                          placeholder="Ingrese la descripción">{{ old('descripcion', $producto->descripcion) }}</textarea>
            </div>

            <div>
                <label class="block font-bold mb-1">Precio</label>
                <input type="text" name="precio" value="{{ old('precio', $producto->precio) }}"
                       class="w-full border rounded-xl px-4 py-2 shadow-sm focus:ring-2 focus:ring-yellow-400 focus:outline-none">
            </div>

            <div>
                <label class="block font-bold mb-1">Stock</label>
                <input type="text" name="stock" value="{{ old('stock', $producto->stock) }}"
                       class="w-full border rounded-xl px-4 py-2 shadow-sm focus:ring-2 focus:ring-yellow-400 focus:outline-none">
            </div>

            <div class="flex items-center gap-4 mt-4">
                <button type="submit"
                        class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-6 rounded-xl shadow-lg transition transform hover:-translate-y-1">
                    Actualizar Producto
                </button>

                <a href="{{ route('productos.index') }}"
                   class="text-blue-600 hover:underline font-semibold">
                   Volver al listado
                </a>
            </div>
        </form>
    </div>
</div>

@endsection
