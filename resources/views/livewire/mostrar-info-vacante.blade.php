<div class="p-4">
    <div class="md:grid grid-cols-2">
        <div class="md:order-last">
            <div class="my-3 md:flex md:justify-between md:items-center">
                <div>
                    <p class="mb-1 font-bold">Tipo de trabajo: <span class="font-normal">{{ $vacante->categoria->categoria }}</span></p>
                    <p class="mb-1 font-bold">Horario: <span class="font-normal">{{ $vacante->horario->horario }}</span></p>
                </div>
                <div>
                    <p class="font-bold">Salario: <span class="font-normal">{{ $vacante->signo->signo }} {{ number_format($vacante->salario, 0, ',', '.') }}</span></p>
                </div>

            </div>
            <hr>
            <div class="my-3">
                {!! nl2br($vacante->descripcion) !!}
            </div>

        </div>
        <div class="flex justify-center items-center mt-5">
            @if ($vacante->imagen == "no_image")
                <img src="{{ asset('img/peep-vacante-sin-imagen.png') }}" alt="Imagen Vacante">
            @else
                <img src="{{ asset('storage/vacantes/' . $vacante->imagen) }}" alt="Imagen Vacante">
            @endif

        </div>

    </div>


</div>
