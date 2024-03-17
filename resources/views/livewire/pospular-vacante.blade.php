<div>
    @auth
        @cannot('create', App\Models\Vacante::class)
        <div class="flex flex-col justify-center items-center p-5">
            <h3 class="text-center text-2xl font-bold my2">Postula a esta vacante</h3>
            @if (session()->has('mensaje'))
                <div class="uppercase border border-green-600 bg-green-100 text-green-600 font-bold p-2 my-2">
                    {{ session('mensaje') }}
                </div>
            @elseif (session()->has('error'))
            <div class="uppercase border border-green-600 bg-green-100 text-green-600 font-bold p-2 my-2">
                {{ session('error') }}
            </div>
            @else
                <form wire:submit.prevent='postularme' class="w-96 mt-5" action="">
                    <div class="mb-5">
                        <x-input-label for="cv" :value="__('Subir Cv o Hoja de vida (PDF)')" />
                        <x-text-input name="cv" id="cv" class="block mt-1 w-full" type="file" wire:model="cv" accept=".pdf" wire:model='cv'/>
                        @error('cv')
                        <livewire:mostrar-alerta :message="__('Debes subir tu pdf')"/>
                    @enderror
                    </div>

                    <x-primary-button class="w-full justify-center mt-3">
                        Postular
                    </x-primary-button>
                </form>
            @endif

        </div>

        @endcannot
    @endauth
    @guest
        <div class="p-5 text-center">
            <p>¿Deseas postular a esta vacante? <span><a class="font-bold text-indigo-600" href="{{ route('login') }}">Inicia Sesión aquí</a></span> y postula a esta oportunidad laboral</p>
            <p>Si no tienes una cuenta, puedes <span><a class="font-bold text-indigo-600" href="{{ route('register') }}">registrarte aquí </a></span></p>
        </div>
    @endguest

</div>
