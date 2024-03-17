<x-app-layout>
    <div class="container-header top-0 right-0 z-40">
        <div class="bg-white overflow-hidden">
            <img class="img" src="{{ asset('img/header.jpg') }}" alt="" srcset="">
            <div class="pt-40 max-w-xl mx-auto px-4 sm:px-6 lg:px-8 lg:max-w-7xl z-20"> <!-- Agrega la clase z-dropdown aquí -->
                <div class="relative">
                    <h2 class="text-center text-4xl leading-8 font-semibold tracking-tight text-gray-200 sm:text-6xl">Encuentra un trabajo en MyJobs de forma remota</h2>
                    <p class="mt-4 max-w-3xl mx-auto text-center text-xl text-gray-300">Encuentra el trabajo de tus sueños en una empresa internacional; tenemos vacantes para front end developer, backend, devops, mobile y mucho más!</p>
                </div>
            </div>
        </div> 
    </div> 
    <livewire:home-vacantes>
</x-app-layout>