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
                    <div class="bg-red-200 text-red-800 p-3 rounded mb-6 text-sm">
                        <ul class="list-disc ml-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('productos.store') }}" class="space-y-4"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Imagen del Producto</label>
                        <input type="file" name="imagen" accept="image/*"
                            class="border rounded w-full py-2 px-3 @error('imagen') border-red-500 @enderror">
                        @error('imagen')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <hr class="my-4">
                    <p class="font-bold text-gray-600">Datos del producto:</p>

                    <input name="nombre" value="{{ old('nombre') }}"
                        class="w-full border rounded p-2 @error('nombre') border-red-500 @enderror"
                        placeholder="Nombre">

                    <textarea name="descripcion" class="w-full border rounded p-2 @error('descripcion') border-red-500 @enderror"
                        placeholder="Descripción">{{ old('descripcion') }}</textarea>

                    <div class="grid grid-cols-2 gap-4">
                        <input name="precio" value="{{ old('precio') }}" type="text" inputmode="decimal"
                            placeholder="0.00"
                            class="w-full border rounded p-2 @error('precio') border-red-500 @enderror" />

                        <input name="stock" value="{{ old('stock') }}" type="number"
                            class="w-full border rounded p-2 @error('stock') border-red-500 @enderror"
                            placeholder="Stock">
                    </div>

                    <select name="category_id"
                        class="w-full border rounded p-2 @error('category_id') border-red-500 @enderror" required>
                        <option value="">Seleccione una categoría</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>

                    <div class="flex items-center justify-end mt-4">
                        <a href="{{ route('productos.index') }}" class="text-gray-600 mr-4">Cancelar</a>
                        <button type="submit"
                            class="bg-green-500 hover:bg-green-600 text-white font-bold px-6 py-2 rounded-xl transition shadow-md">
                            Guardar Producto
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
