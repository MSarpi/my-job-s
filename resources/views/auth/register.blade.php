@include('layouts.navigation')
<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" novalidate>
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nombre')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Correo')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Rol -->
        <div class="mt-4">
            <x-input-label for="rol" :value="__('Seleccione su rol')" />
            <select id="rol" name="rol" class="w-full rounded-md font-medium border-gray-300 dark:border-gray-800">
                <option value="0" selected disabled>-- Selecciona un rol --</option>
                <option value="1">Trabajador</option>
                <option value="2">Reclutador</option>
            </select>
            <x-input-error :messages="$errors->get('rol')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Contraseña')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm. Contraseña')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex  justify-between mt-4">
            <x-link :href="route('login')">
                {{ __('¿Ya tenias una cuenta? Inicia sesión') }}
            </x-link>

            {{-- :href sirve para crear rutas dinamicas al momento de ser usado con componentes --}}
            {{-- @if (Route::has('password.request'))

            @endif --}}

        </div>

        <x-primary-button class="w-full justify-center mt-3">
            {{ __('Registrar') }}
        </x-primary-button>
    </form>
</x-guest-layout>
