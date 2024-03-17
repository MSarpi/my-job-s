<form class="md:w-1/2" wire:submit.prevent='editarVacante' >
    <div class="mb-5">
        <x-input-label for="estado" :value="__('Estado')" />
        <select wire:model="estado" id="estado" class="w-full mt-1 rounded-md font-medium border-gray-300 dark:border-gray-800">
            <option value="1">Activo</option>
            <option value="2">Pausado</option>
            <option value="3">Terminado</option>
        </select>
        @error('estado')
            <livewire:mostrar-alerta :message="__('*')"/>
        @enderror
        {{-- <x-input-error :messages="$errors->get('signo')" class="mt-2" /> --}}
    </div>

    <div>
        <x-input-label for="empresa" :value="__('Empresa')" />
        <x-text-input id="empresa" class="block mt-1 w-full" type="text" wire:model="empresa" :value="old('empresa')" placeholder="Ej: Facebook, Instagram, Tiktok, Etc.." />
        {{-- <x-input-error :messages="$errors->get('email')" class="mt-2" /> --}}
        @error('empresa')
        <div id="alerta_error">
            <livewire:mostrar-alerta :message="__('Nombre de empresa es requerido')"/>
        </div>

        @enderror
    </div>
    <br>

    <div>
        <x-input-label for="t_vacante" :value="__('Titulo Vacante')" />
        <x-text-input id="t_vacante" class="block mt-1 w-full" type="text" wire:model="t_vacante" :value="old('t_vacante')" placeholder="Ej: Programador Fullstack Jr." />
        {{-- <x-input-error :messages="$errors->get('email')" class="mt-2" /> --}}
        @error('t_vacante')
            <div id="alerta_error_2">
                <livewire:mostrar-alerta :message="__('Titulo Vacante es requerido')"/>
            </div>
        @enderror
    </div>
    <br>

    <div class="grid grid-cols-4">
        <div class=" mr-2">
            <x-input-label for="signo" :value="__('Signo')" />
            <select wire:model="signo" id="signo" class="w-11/12 mt-1 rounded-md font-medium border-gray-300 dark:border-gray-800">
                <option value="">--</option>
                @foreach ($singnos as $s)
                    <option value="{{ $s->id }}" {{ $signo == $s->id ? 'selected' : '' }}>{{ $s->signo }}</option>
                @endforeach
            </select>
            @error('signo')
                <livewire:mostrar-alerta :message="__('*')"/>
            @enderror
            {{-- <x-input-error :messages="$errors->get('signo')" class="mt-2" /> --}}
        </div>
        <div class="col-span-3">
            <x-input-label for="salario" :value="__('Salario Mensual')" />
            <x-text-input id="salario" class="block mt-1 w-full" type="number" wire:model="salario" :value="old('salario')" placeholder="Ej: 100000" />
            {{-- <x-input-error :messages="$errors->get('salario')" class="mt-2" /> --}}
            @error('salario')
                <livewire:mostrar-alerta :message="__('Salario mensual es requerido')"/>
            @enderror
        </div>

    </div>
    <br>
    <div class="md:grid md:grid-cols-2">
        <div class="mb-2 mr-2">
            <x-input-label for="categoria" :value="__('Categoria')" />
            <select wire:model="categoria" id="categoria" class="w-full mt-1 rounded-md font-medium border-gray-300 dark:border-gray-800">
                <option value="">-- Seleccione --</option>
                @foreach ($categorias as $c)
                    <option value="{{ $c->id }}" {{ $categoria == $c->id ? 'selected' : '' }}>{{ $c->categoria }}</option>
                @endforeach
            </select>
            @error('categoria')
                <livewire:mostrar-alerta :message="$message"/>
            @enderror
            {{-- <x-input-error :messages="$errors->get('signo')" class="mt-2" /> --}}
        </div>

        <div class="">
            <x-input-label for="horario" :value="__('Horario')" />
            <select wire:model="horario" id="horario" class="w-full mt-1 rounded-md font-medium border-gray-300 dark:border-gray-800">
                <option value="">-- Seleccione --</option>
                @foreach ($horarios as $h)
                    <option value="{{ $h->id }}" {{ $horario == $h->id ? 'selected' : '' }}>{{ $h->horario }}</option>
                @endforeach
            </select>
            @error('horario')
            <livewire:mostrar-alerta :message="$message"/>
        @enderror
            {{-- <x-input-error :messages="$errors->get('signo')" class="mt-2" /> --}}
        </div>

    </div>
    <br>
    <div>
        <x-input-label for="last_day" :value="__('Fecha de expiración')" />
        <x-text-input id="last_day" class="block mt-1 w-full" type="date" wire:model="last_day" :value="old('last_day')" min="{{ now()->addDay()->format('Y-m-d') }}"/>
        {{-- <x-input-error :messages="$errors->get('email')" class="mt-2" /> --}}
        @error('last_day')
            <livewire:mostrar-alerta :message="__('Fecha de expiración es requerido')"/>
        @enderror
    </div>
    <br>
    <div>
        <x-input-label for="descripcion" :value="__('Descripción de empleo')" />
        <textarea wire:model="descripcion" id="descripcion"  placeholder="Descripcion general del puesto..." class="rounded-md font-medium border-gray-300 dark:border-gray-800 w-full h-72"></textarea>
        {{-- <x-input-error :messages="$errors->get('email')" class="mt-2" /> --}}
        @error('descripcion')
            <livewire:mostrar-alerta :message="__('El campo descripción es requerido')"/>
        @enderror
    </div>
    <br>
    <div>
        <x-input-label for="n_imagen" :value="__('Agregar Imagen (Opcional)')" />
        <x-text-input id="n_imagen" class="block mt-1 w-full" type="file" wire:model="n_imagen" accept="image/*" />

        @if ($imagen == "no_image")
        <div class="my-5 W-80">
            <x-input-label for="imagen" :value="__('Esta publicación se realizo sin imagen, si deseas agregar una solo debes seleccionar una imagen')" />
        </div>
        @else
        <div class="my-5 W-80">
            <x-input-label for="imagen" :value="__('imagen actual')" />
            <img src="{{ asset('storage/vacantes/' . $imagen) }}" alt="imagen vacante " srcset="">
        </div>
        @endif

        <div class="my-5">
            @if ($n_imagen)
                Imagen Nueva: <img src="{{ $n_imagen->temporaryUrl() }}" />
            @endif
        </div>
    </div>

    <x-primary-button class="w-full justify-center mt-3">
        Guardar Cambios
    </x-primary-button>

</form>
