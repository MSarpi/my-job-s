@php
    $class = "underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
    //Esto es un bloque de php para almacenar datos estaticos o de una base de datos
@endphp
<a {{ $attributes->merge(['class' => $class]) }}>
    {{-- $attributes->merge(['class' => $nombredebloque]) = $attributes toma todos los atributos que se toma en el componente --}}
    {{ $slot }}
    {{-- la variable $slot, sirve para poner nombres personalizados para los componentes que se repiten
        esto ayuda mucho a facilitar el codigo al momento de agregar nuevos componentes y tener el codigo mas limpio --}}
</a>
