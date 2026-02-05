<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Producto
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-lg mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-3xl shadow-2xl p-8">

                <form method="POST" action="{{ route('productos.update', $producto) }}" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <input name="nombre" value="{{ $producto->nombre }}" class="w-full border rounded p-2">
                    <textarea name="descripcion" class="w-full border rounded p-2">{{ $producto->descripcion }}</textarea>
                    <input name="precio" value="{{ $producto->precio }}" class="w-full border rounded p-2">
                    <input name="stock" value="{{ $producto->stock }}" class="w-full border rounded p-2">
                    <!-- Categoría -->
                    <select name="category_id" class="w-full border rounded p-2" required>
                        <option value="">Seleccione una categoría</option>

                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>

                    <button class="bg-yellow-500 text-white px-4 py-2 rounded">
                        Actualizar
                    </button>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
