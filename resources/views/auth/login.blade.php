<x-guest-layout>
    <div class="min-h-screen flex flex-col bg-gray-50">

        <!-- Navbar -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center h-16">
                <h1 class="text-2xl font-bold text-pink-600">MiPanel</h1>
                <nav class="space-x-4">
                    <a href="{{ route('welcome') }}" class="text-gray-700 hover:text-pink-600 font-medium">Inicio</a>
                    <a href="{{ route('register') }}" class="text-gray-700 hover:text-pink-600 font-medium">Registrarse</a>
                </nav>
            </div>
        </header>

        <!-- Login Card -->
        <main class="flex-grow flex items-center justify-center py-20 px-4">
            <div class="bg-white shadow-xl rounded-2xl w-full max-w-md p-8">

                <h2 class="text-3xl font-bold text-center text-pink-600 mb-6">Iniciar Sesión</h2>

                <!-- Errores de validación -->
                <x-validation-errors class="mb-4" />

                <!-- Mensajes de sesión -->
                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600 text-center">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="space-y-4">
                    @csrf

                    <!-- Email -->
                    <div>
                        <x-label for="email" value="{{ __('Email') }}" class="block text-gray-700 font-medium mb-1"/>
                        <x-input id="email" class="block mt-1 w-full rounded-lg border-gray-300 focus:border-pink-500 focus:ring focus:ring-pink-200" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    </div>

                    <!-- Password -->
                    <div>
                        <x-label for="password" value="{{ __('Password') }}" class="block text-gray-700 font-medium mb-1"/>
                        <x-input id="password" class="block mt-1 w-full rounded-lg border-gray-300 focus:border-pink-500 focus:ring focus:ring-pink-200" type="password" name="password" required autocomplete="current-password" />
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center justify-between">
                        <label for="remember_me" class="flex items-center text-gray-600">
                            <x-checkbox id="remember_me" name="remember" class="mr-2"/>
                            {{ __('Remember me') }}
                        </label>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-sm text-pink-600 hover:underline">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                    </div>

                    <!-- Botón Login -->
                    <div>
                        <x-button class="w-full bg-pink-600 hover:bg-pink-700 text-white font-bold py-2 px-4 rounded-lg">
                            {{ __('Log in') }}
                        </x-button>
                    </div>
                </form>

                <!-- Link a Registro -->
                <p class="mt-6 text-center text-gray-600">
                    ¿No tienes cuenta?
                    <a href="{{ route('register') }}" class="text-pink-600 font-medium hover:underline">Regístrate aquí</a>
                </p>

            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-white shadow mt-10">
            <div class="max-w-7xl mx-auto px-4 py-6 text-center text-gray-600">
                &copy; 2026 MiPanel. Todos los derechos reservados.
            </div>
        </footer>

    </div>
</x-guest-layout>
