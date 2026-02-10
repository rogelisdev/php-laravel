<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detalle del Producto
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-lg mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-3xl shadow-2xl p-8 space-y-5">

                {{-- Imagen --}}
                <div>
                    <p class="font-semibold text-gray-700 mb-2">Imagen</p>

                    @if ($producto->imagen)
                        <div class="w-64 h-64 mx-auto overflow-hidden rounded-xl shadow">
                            <img
                                src="{{ asset('storage/' . $producto->imagen) }}"
                                alt="{{ $producto->nombre }}"
                                class="w-full h-full object-cover"
                            >
                        </div>
                    @else
                        <div class="w-64 h-64 mx-auto flex items-center justify-center bg-gray-100 rounded-xl text-gray-500 italic">
                            Sin imagen
                        </div>
                    @endif
                </div>

                {{-- Datos --}}
                <div class="space-y-2 text-sm">
                    <p><b>ID:</b> {{ $producto->id }}</p>
                    <p><b>Nombre:</b> {{ $producto->nombre }}</p>

                    <p>
                        <b>Categoría:</b>
                        <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2 py-0.5 rounded">
                            {{ $producto->category->name ?? 'Sin categoría' }}
                        </span>
                    </p>

                    <p><b>Descripción:</b> {{ $producto->descripcion ?: '—' }}</p>
                    <p><b>Precio:</b> ${{ number_format($producto->precio, 2) }}</p>
                    <p><b>Stock:</b> {{ $producto->stock }}</p>
                </div>

                {{-- Volver --}}
                <div class="pt-4">
                    <a href="{{ route('productos.index') }}"
                       class="inline-flex items-center text-blue-600 hover:underline">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Volver al listado
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
