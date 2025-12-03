<x-layout>


        <x-slot:title>

           Nueva Reserva

        </x-slot>
    <main class="flex max-w-[335px] w-full flex-col-reverse lg:max-w-4xl lg:flex-row">
        <div class="text-[13px] leading-[20px] flex-1 p-6 pb-12 lg:p-20 bg-white dark:bg-[#161615] dark:text-[#EDEDEC] shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] rounded-bl-lg rounded-br-lg lg:rounded-tl-lg lg:rounded-br-none">
            <h1 class="mb-1 font-medium">Nueva Reserva: </h1>
            <h2>Fecha: {{$fecha}}</h2>
            <h2>hora: {{$hora}}</h2>
            <h2>numero de personas: {{$num_personas}}</h2>
            <h2>Salas Libres</h2>

            <div>
                <ul>
                    @foreach($libres as $sala)


                        <div class="bg-neutral-primary-soft block max-w-sm p-6 border border-default rounded-base shadow-xs">
                            <h3 class="mb-3 text-2xl font-semibold tracking-tight text-heading leading-8">Sala {{$sala->id}}</h3>
                            <p class="text-body mb-6">Capasidad: {{$sala->capacidad}}</p>
                            <p class="text-body mb-6">Informacion: {{$sala->descripcion}}</p>
                            <a href="#" class="inline-flex items-center text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                               Reservar
                                <svg class="w-4 h-4 ms-1.5 rtl:rotate-180 -me-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4"/></svg>
                            </a>
                        </div>


                    @endforeach
                </ul>
            </div>


        </div>



    </main>
</x-layout>
