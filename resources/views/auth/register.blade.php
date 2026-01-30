<x-guest-layout>
    <div class="min-h-screen flex flex-col bg-gray-50">

        <!-- Navbar -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center h-16">
                <h1 class="text-2xl font-bold text-pink-600">MiPanel</h1>
                <nav class="space-x-4">
                    <a href="{{ route('welcome') }}" class="text-gray-700 hover:text-pink-600 font-medium">Inicio</a>
                    <a href="{{ route('login') }}" class="text-gray-700 hover:text-pink-600 font-medium">Iniciar Sesión</a>
                </nav>
            </div>
        </header>

        <!-- Register Card -->
        <main class="flex-grow flex items-center justify-center py-20 px-4">
            <div class="bg-white shadow-xl rounded-2xl w-full max-w-md p-8">

                <h2 class="text-3xl font-bold text-center text-pink-600 mb-6">Crear Cuenta</h2>

                <!-- Errores de validación -->
                <x-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('register') }}" class="space-y-4">
                    @csrf

                    <!-- Name -->
                    <div>
                        <x-label for="name" value="{{ __('Name') }}" class="block text-gray-700 font-medium mb-1"/>
                        <x-input id="name" class="block mt-1 w-full rounded-lg border-gray-300 focus:border-pink-500 focus:ring focus:ring-pink-200" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    </div>

                    <!-- Email -->
                    <div>
                        <x-label for="email" value="{{ __('Email') }}" class="block text-gray-700 font-medium mb-1"/>
                        <x-input id="email" class="block mt-1 w-full rounded-lg border-gray-300 focus:border-pink-500 focus:ring focus:ring-pink-200" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    </div>

                    <!-- Password -->
                    <div>
                        <x-label for="password" value="{{ __('Password') }}" class="block text-gray-700 font-medium mb-1"/>
                        <x-input id="password" class="block mt-1 w-full rounded-lg border-gray-300 focus:border-pink-500 focus:ring focus:ring-pink-200" type="password" name="password" required autocomplete="new-password" />
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" class="block text-gray-700 font-medium mb-1"/>
                        <x-input id="password_confirmation" class="block mt-1 w-full rounded-lg border-gray-300 focus:border-pink-500 focus:ring focus:ring-pink-200" type="password" name="password_confirmation" required autocomplete="new-password" />
                    </div>

                    <!-- Terms and Privacy -->
                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="flex items-start mt-4">
                            <x-checkbox name="terms" id="terms" class="mt-1" required />
                            <label for="terms" class="ml-2 text-gray-600 text-sm">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                    'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-pink-600 hover:text-pink-700">'.__('Terms of Service').'</a>',
                                    'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-pink-600 hover:text-pink-700">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </label>
                        </div>
                    @endif

                    <!-- Botón Register -->
                    <div>
                        <x-button class="w-full bg-pink-600 hover:bg-pink-700 text-white font-bold py-2 px-4 rounded-lg">
                            {{ __('Register') }}
                        </x-button>
                    </div>
                </form>

                <!-- Link a Login -->
                <p class="mt-6 text-center text-gray-600">
                    ¿Ya tienes cuenta?
                    <a href="{{ route('login') }}" class="text-pink-600 font-medium hover:underline">Inicia sesión aquí</a>
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
