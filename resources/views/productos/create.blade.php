@extends('layouts.app')

@section('title', 'Crear Producto')

@section('content')

<h1 class="text-3xl font-bold mb-4">Crear Nuevo Producto</h1>

@if($errors->any())
    <div class="bg-red-200 text-red-800 p-3 rounded mb-4">
        <ul class="list-disc pl-5">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('productos.store') }}" method="POST" class="bg-white p-6 rounded shadow-md max-w-lg">
    @csrf

    <div class="mb-4">
        <label class="block font-bold mb-1">Nombre del producto</label>
        <input type="text" name="nombre" value="{{ old('nombre') }}" class="w-full border rounded px-3 py-2" placeholder="Ingrese el nombre del producto">
    </div>

    <div class="mb-4">
        <label class="block font-bold mb-1">Descripción</label>
        <textarea name="descripcion" class="w-full border rounded px-3 py-2" placeholder="Ingrese la descripción">{{ old('descripcion') }}</textarea>
    </div>

    <div class="mb-4">
        <label class="block font-bold mb-1">Precio</label>
        <input type="text" name="precio" value="{{ old('precio') }}" class="w-full border rounded px-3 py-2" placeholder="0.00">
    </div>

    <div class="mb-4">
        <label class="block font-bold mb-1">Stock</label>
        <input type="text" name="stock" value="{{ old('stock') }}" class="w-full border rounded px-3 py-2" placeholder="0">
    </div>

    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
        Guardar Producto
    </button>

    <a href="{{ route('productos.index') }}" class="ml-4 text-blue-600 hover:underline">Volver al listado</a>
</form>

@endsection
