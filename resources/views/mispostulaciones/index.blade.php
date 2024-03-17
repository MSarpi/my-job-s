<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mis Postulaciones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-4xl text-bold font-bold text-center mb-10">{{ __("Mis postulaciones") }}</h1>
                    @forelse ($candidatos as $candidato)
                    <div class="p-6 bg-white border-b border-gray-200 md:flex md:justify-between md:items-center">
                        <div class="leading-10">
                            <a href="{{ route('vacantes.show', $candidato->id_vacante ) }}" class="text-xl font-bold">
                                {{ $candidato->titulo }}
                            </a>
                            <p class="text-sm text-gray-600 font-bold">{{ $candidato->empresa }}</p>
                            <p class="text-sm text-gray-400 font-bold">{{ date('d/m/Y', strtotime($candidato->expiracion)) }}</p>
                        </div>
                        <div class="flex gap-3 items-center justify-center mt-5 md:mt-0">
                            <a title="Ver publicación" href="{{ route('vacantes.show', $candidato->id_vacante ) }}" class="bg-green-600 py-2 px-4 rounded-lg text-white text-sm font-bold uppercase">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                  </svg>
            
                            </a>
                        </div>
                    </div>

                    @empty
                    <p>no te has postulado</p>
                    @endforelse

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
