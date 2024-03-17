<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mis Candidatos para') }}: <span class="font-bold">{{ $vacante->titulo }}</span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-4xl text-bold font-bold text-center mb-10">{{ __("Candidatos") }}</h1>

                    <div class="md:flex md:justify-center p-5 ">
                        <ul class="divide-y divide-gray-300 w-full">
                            @forelse ($vacante->candidatos as $candidato)
                            <li class="p-3 flex items-center">
                                <div class="flex-1">
                                    <p class="text-xl font-medium text-gray-800"> {{ $candidato->user->name }}</p>
                                    <p class="text-sm text-gray-800"> {{ $candidato->user->email }}</p>
                                    <p class="text-sm text-gray-800 font-medium">Postulado <span class="font-normal">{{ $candidato->created_at->diffForHumans() }}</span></p>
                                </div>
                                <div>
                                    <a class="p-2 inline-flex items-center shadow-sm px-2.5 border border-gray-300 text-sm leading-5 rounded-full font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-200"
                                    href="{{ asset('storage/cv/' . $candidato->cv) }}" target="_BLANK" rel="noreferrer noopener">
                                        Ver CV
                                    </a>
                                </div>
                            </li>
                            @empty
                            <p class="p-3 text-center text-gray-600">sin candidatos</p>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

