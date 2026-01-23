@extends('layouts.app')

@section('title', 'Crear Producto')

@section('content')

    <div class="min-h-screen bg-gray-100 flex flex-col">

        {{-- Navbar --}}
        <nav class="bg-purple-600 text-white shadow-md py-4 px-8 flex justify-between items-center">
            {{-- Título o logo --}}
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
        <main class="flex-grow flex justify-center items-start p-8">
            <div class="w-full max-w-lg bg-white rounded-3xl shadow-2xl p-8 flex flex-col">

                <h1 class="text-3xl font-bold mb-6 text-pink-600 drop-shadow-md">Crear Nuevo Producto</h1>

                {{-- Mostrar errores --}}
                @if ($errors->any())
                    <div class="bg-red-200 text-red-800 p-3 rounded mb-6">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Formulario --}}
                <form action="{{ route('productos.store') }}" method="POST" class="flex flex-col space-y-4">
                    @csrf

                    <div>
                        <label class="block font-bold mb-1">Nombre del producto</label>
                        <input type="text" name="nombre" value="{{ old('nombre') }}"
                            class="w-full border rounded px-3 py-2" placeholder="Ingrese el nombre del producto">
                    </div>

                    <div>
                        <label class="block font-bold mb-1">Descripción</label>
                        <textarea name="descripcion" class="w-full border rounded px-3 py-2" placeholder="Ingrese la descripción">{{ old('descripcion') }}</textarea>
                    </div>

                    <div>
                        <label class="block font-bold mb-1">Precio</label>
                        <input type="text" name="precio" value="{{ old('precio') }}"
                            class="w-full border rounded px-3 py-2" placeholder="0.00">
                    </div>

                    <div>
                        <label class="block font-bold mb-1">Stock</label>
                        <input type="text" name="stock" value="{{ old('stock') }}"
                            class="w-full border rounded px-3 py-2" placeholder="0">
                    </div>

                    <div class="flex items-center mt-4">
                        <button type="submit"
                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            Guardar Producto
                        </button>

                        <a href="{{ route('productos.index') }}" class="ml-4 text-blue-600 hover:underline">Volver al
                            listado</a>
                    </div>
                </form>

            </div>
        </main>

        {{-- Footer --}}
        <footer class="bg-gray-200 text-gray-700 py-4 text-center">
            Practicando
        </footer>

    </div>

@endsection
