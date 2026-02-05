<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Crear Producto
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-lg mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-3xl shadow-2xl p-8">

                @if ($errors->any())
                    <div class="bg-red-200 text-red-800 p-3 rounded mb-6">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('productos.store') }}" class="space-y-4">
                    @csrf

                    <input name="nombre" class="w-full border rounded p-2" placeholder="Nombre">
                    <textarea name="descripcion" class="w-full border rounded p-2" placeholder="Descripción"></textarea>
                    <input name="precio" class="w-full border rounded p-2" placeholder="Precio">
                    <input name="stock" class="w-full border rounded p-2" placeholder="Stock">
                    <!-- Categoría -->
                    <select name="category_id" class="w-full border rounded p-2" required>
                        <option value="">Seleccione una categoría</option>

                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>

                    <button class="bg-green-500 text-white px-4 py-2 rounded">
                        Guardar
                    </button>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
