<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg p-6 text-center">
                <h1 class="text-3xl font-bold text-gray-800 mb-4">¡Bienvenido, {{ Auth::user()->name }}!</h1>
                <p class="text-gray-600 mb-6">
                    Gestiona tus productos y usuarios según tu rol.
                </p>

                @if(Auth::user()->role === 'admin')
                    <div class="flex justify-center gap-4">
                        <a href="{{ route('productos.index') }}"
                           class="px-6 py-3 bg-purple-500 text-white rounded-lg hover:bg-purple-600">
                            Ver Productos
                        </a>
                        <a href="{{ route('productos.create') }}"
                           class="px-6 py-3 bg-pink-500 text-white rounded-lg hover:bg-pink-600">
                            Crear Producto
                        </a>
                        <a href="{{ route('usuarios.index') }}"
                           class="px-6 py-3 bg-green-500 text-white rounded-lg hover:bg-green-600">
                            Ver Usuarios
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
