<div>

   <div class="py-12">
      {{-- <div class="max-w-7xl mx-auto">
         <h3 class="font-bold text-4xl text-gray-700 mb-6 p-6">
            Vacantes Disponibles
         </h3>
      </div> --}}
      <div class="bg-white shadow-sm rounded-lg m-6 p-6 divide-y divide-gray-200">
         <livewire:filtrar-vacantes/>
         @forelse ($vacantes as $vacante)
         <div class="md:flex md:justify-between md:items-center py-5">
            <div class="leading-10">
               <a href="{{ route('vacantes.show', $vacante->id ) }}" class="text-xl font-bold">
                   {{ $vacante->titulo }}
               </a>
               <p class="text-sm text-gray-600 font-bold">{{ $vacante->empresa }}</p>
               <p class="text-sm text-gray-500 font-bold">{{ $vacante->categoria->categoria }} - {{ $vacante->horario->horario }}</p>
               <p class="text-sm text-gray-400 font-bold">Expira: {{ date('d/m/Y', strtotime($vacante->expiracion)) }}</p>
           </div>
            <div class="bg-green-600 py-2 px-4 rounded-lg text-white text-sm font-bold uppercase">
               <a href="{{route('vacantes.show', $vacante->id)}}"> Ver vacante</a>
            </div>
            
         </div>
         
         @empty
             <p class="p-3 text-center text-sm text-gray-600">No hay vacantes disponibles</p>
         @endforelse
      </div>
      <div class="m-10">
         {{-- Navegacion --}}
         {{ $vacantes->links() }}
     </div>
   </div>


</div>
 