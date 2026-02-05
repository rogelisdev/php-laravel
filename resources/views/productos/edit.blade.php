<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Producto: {{ $producto->nombre }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-lg mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-3xl shadow-2xl p-8">

                <form method="POST" action="{{ route('productos.update', $producto->id) }}" class="space-y-4" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-sm font-bold text-gray-700">Imagen Actual</label>
                        @if($producto->imagen)
                            <img src="{{ asset('storage/' . $producto->imagen) }}" class="w-32 h-32 object-cover rounded-lg my-2 shadow">
                        @else
                            <p class="text-gray-400 text-xs italic">Sin imagen asignada</p>
                        @endif
                        <input type="file" name="imagen" class="w-full border rounded p-2 text-sm @error('imagen') border-red-500 @enderror">
                        @error('imagen') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="text-xs text-gray-500 font-bold">Nombre</label>
                        <input name="nombre" value="{{ old('nombre', $producto->nombre) }}" class="w-full border rounded p-2">
                        @error('nombre') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="text-xs text-gray-500 font-bold">Descripción</label>
                        <textarea name="descripcion" class="w-full border rounded p-2">{{ old('descripcion', $producto->descripcion) }}</textarea>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="text-xs text-gray-500 font-bold">Precio</label>
                            <input name="precio" type="number" step="0.01" value="{{ old('precio', $producto->precio) }}" class="w-full border rounded p-2">
                        </div>
                        <div>
                            <label class="text-xs text-gray-500 font-bold">Stock</label>
                            <input name="stock" type="number" value="{{ old('stock', $producto->stock) }}" class="w-full border rounded p-2">
                        </div>
                    </div>

                    <div>
                        <label class="text-xs text-gray-500 font-bold">Categoría</label>
                        <select name="category_id" class="w-full border rounded p-2" required>
                            <option value="">Seleccione una categoría</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ (old('category_id') ?? $producto->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex justify-between items-center pt-4">
                        <a href="{{ route('productos.index') }}" class="text-gray-500 underline text-sm">Cancelar</a>
                        <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold px-6 py-2 rounded-xl transition shadow">
                            Actualizar Producto
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
