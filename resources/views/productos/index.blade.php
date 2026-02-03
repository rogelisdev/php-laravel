<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Listado de Productos
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            <a href="{{ route('productos.create') }}"
               class="inline-block mb-6 px-6 py-3 bg-purple-500 text-white rounded-xl font-bold">
                + Nuevo Producto
            </a>

            @if(session('success'))
                <div class="bg-green-200 text-green-800 p-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow-xl rounded-2xl overflow-hidden">
                <table class="min-w-full">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="p-3">ID</th>
                            <th class="p-3">Nombre</th>
                            <th class="p-3">Precio</th>
                            <th class="p-3">Stock</th>
                            <th class="p-3">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($productos as $producto)
                            <tr class="border-b hover:bg-gray-100">
                                <td class="p-3 text-center">{{ $producto->id }}</td>
                                <td class="p-3 text-center">{{ $producto->nombre }}</td>
                                <td class="p-3 text-center">${{ number_format($producto->precio,2) }}</td>
                                <td class="p-3 text-center">{{ $producto->stock }}</td>
                                <td class="p-3 flex flex-row justify-center gap-2">
                                    <a href="{{ route('productos.show',$producto) }}">👁</a>
                                    <a href="{{ route('productos.edit',$producto) }}">✏️</a>
                                    <form method="POST" action="{{ route('productos.destroy',$producto) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('¿Eliminar?')">🗑</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="p-4 text-center text-gray-500">
                                    No hay productos
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                {{ $productos->links() }}
            </div>

        </div>
    </div>
</x-app-layout>
