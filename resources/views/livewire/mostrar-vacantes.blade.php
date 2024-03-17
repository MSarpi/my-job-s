<div>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        @forelse ($vacantes as $vacante)
        <div class="p-6 bg-white border-b border-gray-200 md:flex md:justify-between md:items-center">
            <div class="leading-10">
                <a href="{{ route('vacantes.show', $vacante->id) }}" class="text-xl font-bold">
                    {{ $vacante->titulo }}
                </a>
                <p class="text-sm text-gray-600 font-bold">{{ $vacante->empresa }}</p>
                @if($vacante->expiracion < date('Y-m-d'))
                    <p class="text-sm text-red-400 font-bold">Expirado</p>
                @else
                    @if ($vacante->publicado == 1)
                    <p class="text-sm text-gray-400 font-bold">Estado: Activo</p>
                    @elseif ($vacante->publicado == 2)
                        <p class="text-sm text-gray-400 font-bold">Estado: Pausado</p>
                    @elseif ($vacante->publicado == 3)
                        <p class="text-sm text-gray-400 font-bold">Estado: Terminado</p>   
                    @endif
                @endif
                <p class="text-sm text-gray-400 font-bold">{{ date('d/m/Y', strtotime($vacante->expiracion)) }}</p>
            </div>
            
            <div class="flex gap-3 items-center justify-center mt-5 md:mt-0">
                <a title="Ver publicación" href="{{ route('vacantes.show',$vacante->id ) }}" class="bg-green-600 py-2 px-4 rounded-lg text-white text-sm font-bold uppercase">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                      </svg>

                </a>

                <a title="Ver postulantes" href="{{ route('candidatos.index', $vacante) }}" class="flex justify-between bg-slate-800 py-2 px-4 rounded-lg text-white text-sm font-bold uppercase">
                    <span class="w-6 h-6 bg-red-500 text-white rounded-full flex flex-col justify-center items-center text-sm font-bold">{{ $vacante->candidatos->count() }}</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375
                            0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375
                            6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331
                            0-4.512-.645-6.374-1.766Z" />
                    </svg>
                </a>
                <a title="Editar publicación" href="{{ route('vacantes.edit', $vacante->id) }}" class="bg-blue-800 py-2 px-4 rounded-lg text-white text-sm font-bold uppercase">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652
                            2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5
                            4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25
                            2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25
                            2.25 0 0 1 5.25 6H10" />
                    </svg>
                </a>

                <button title="Eliminar publicación"  wire:click="$dispatch('mostrar_alerta',  {{ $vacante->id }} )" class="bg-red-600 py-2 px-4 rounded-lg text-white text-sm font-bold uppercase">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                        d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107
                        1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244
                        2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108
                        48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0
                        0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964
                        51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                    </svg>
                </button>
            </div>
        </div>
        @empty
            <img class="img-peep" src="{{ asset('img/peep-sin-vacante.png') }}" alt="" srcset="">
        @endforelse

    </div>
    <div class="m-10">
        {{-- Navegacion --}}
        {{ $vacantes->links() }}
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.addEventListener('livewire:initialized', () => {
            @this.on('mostrar_alerta', (vacanteId) => {
                Swal.fire({
                    title: '¿Eliminar Vacante?',
                    text: "Una Vacante eliminada no se puede recuperar:(",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, eliminar!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // ELiminar vacante
                        @this.call('eliminarVacante',vacanteId);
                        Swal.fire(
                            'Se eliminó la Vacante',
                            'Eliminado correctamente',
                            'success'
                        )
                    }
                })

            });
        });
        });

    </script>
</div>



