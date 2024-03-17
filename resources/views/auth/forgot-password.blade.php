<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('
        ¿Olvidaste tu contraseña? No hay problema. Solo indícanos tu dirección de correo electrónico y te enviaremos un enlace para restablecer tu contraseña por correo electrónico, lo que te permitirá elegir una nueva.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex justify-between mt-4">
            <x-link :href="route('login')">
                Inicia sesión
            </x-link>

            <x-link :href="route('register')">
                Crea tú cuenta aquí
            </x-link>

            {{-- :href sirve para crear rutas dinamicas al momento de ser usado con componentes --}}
            {{-- @if (Route::has('password.request'))

            @endif --}}

        </div>

        <x-primary-button class="w-full justify-center mt-3">
            {{ __('Recuperar Contraseña') }}
        </x-primary-button>
    </form>
</x-guest-layout>
