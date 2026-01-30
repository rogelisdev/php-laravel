<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detalle del Producto
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-lg mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-3xl shadow-2xl p-8 space-y-3">

                <p><b>ID:</b> {{ $producto->id }}</p>
                <p><b>Nombre:</b> {{ $producto->nombre }}</p>
                <p><b>Descripción:</b> {{ $producto->descripcion }}</p>
                <p><b>Precio:</b> ${{ number_format($producto->precio,2) }}</p>
                <p><b>Stock:</b> {{ $producto->stock }}</p>

                <a href="{{ route('productos.index') }}" class="text-blue-600 underline">
                    Volver
                </a>

            </div>
        </div>
    </div>
</x-app-layout>
