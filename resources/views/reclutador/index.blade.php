<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mis Vacantes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session()->has('mensaje'))
            <div id="mensaje" class="uppercase border border-green-600 bg-green-100 text-green-600 font-bold p-2 py-3">
                {{ session('mensaje') }}
            </div>

            <script>
                // Agregar código JavaScript para desvanecer el mensaje después de 5 segundos
                setTimeout(function() {
                    var mensajeElement = document.getElementById('mensaje');
                    if (mensajeElement) {
                        mensajeElement.style.transition = "opacity 1s";
                        mensajeElement.style.opacity = 0;
                        setTimeout(function() {
                            mensajeElement.style.display = 'none';
                        }, 1000);
                    }
                }, 5000);
            </script>
        @endif
        <livewire:mostrar-vacantes />
        </div>
    </div>
</x-app-layout>
