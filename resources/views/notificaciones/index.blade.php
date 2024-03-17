<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Notificaciones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-4xl text-bold font-bold text-center mb-10">{{ __("Mis Notificaciones") }}</h1>
                    @forelse ($notificaciones as $notificacion)
                    <div class="p-5 border border-gray-200 flex justify-between items-center">
                        <div class="">
                            <p>Nuevo candidato: <span class="font-bold">{{ $notificacion->data['nombre_vacante'] }}</span></p>
                            <p><span class="font-bold">{{ $notificacion->created_at->diffForHumans() }}</span></p>
                        </div>

                            <a title="Ver Candidatos" href="{{ route('candidatos.index', $notificacion->data['id_vacante']) }}" class="bg-slate-800 py-2 px-4 rounded-lg text-white text-sm font-bold uppercase">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                  </svg>
                            </a>

                    </div>


                    @empty
                        <p>sin notificaciones</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
