<x-layout>
    <x-slot:title>
        Nueva Reserva
    </x-slot>

    <main class="flex max-w-[335px] w-full flex-col-reverse lg:max-w-4xl lg:flex-row">
        <div class="text-[15px] leading-[20px] flex-1 p-6 pb-12 lg:p-20 bg-white dark:bg-[#161615] dark:text-[#EDEDEC] shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] rounded-bl-lg rounded-br-lg lg:rounded-tl-lg lg:rounded-br-none">
            <div class="bg-white shadow-md rounded-xl p-4 mb-6 border border-gray-200">
                <h2 class="text-lg font-semibold text-gray-800 mb-3">
                    Detalles de la reserva
                </h2>

                <div class="flex flex-wrap gap-3 text-sm">
                    <div class="flex items-center gap-2 bg-gray-100 px-3 py-1.5 rounded-lg">
                        <span class="font-medium text-gray-700">Fecha:</span>
                        <span class="text-gray-600">{{ $fecha }}</span>
                    </div>

                    <div class="flex items-center gap-2 bg-gray-100 px-3 py-1.5 rounded-lg">
                        <span class="font-medium text-gray-700">Hora:</span>
                        <span class="text-gray-600">{{ $hora }}</span>
                    </div>

                    <div class="flex items-center gap-2 bg-gray-100 px-3 py-1.5 rounded-lg">
                        <span class="font-medium text-gray-700">Personas:</span>
                        <span class="text-gray-600">{{ $num_personas }}</span>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4 auto-rows-fr">
                @foreach ($libres as $sala)
                    <div class="bg-neutral-primary-soft max-w-sm p-2 m-2 border border-default rounded-base rounded-lg">
                        <h5 class="mb-3 text-2xl font-semibold tracking-tight text-heading leading-8">Sala {{ $sala->id }}</h5>
                        <p class="text-body mb-6"><span class="font-bold">Capacidad:</span> {{ $sala->capacidad }}</p>
                        <p class="text-body mb-6"><span class="font-bold">Información:</span>  {{ $sala->descripcion }}</p>

                        <form action="{{ route('reservas.store') }}" method="POST">
                            @csrf
                            <!-- Datos de la reserva -->
                            <input type="hidden" name="sala_id" value="{{ $sala->id }}">
                            <input type="hidden" name="fecha" value="{{ $fecha }}">
                            <input type="hidden" name="hora" value="{{ $hora }}">
                            <input type="hidden" name="num_personas" value="{{ $num_personas }}">
                            <input type="hidden" name="telefono" value="{{ $telefono }}">

                            <button type="submit" class="text-[15px] leading-[20px] inline-flex p-1 lg:p-2 bg-white dark:bg-[#161615] dark:text-[#EDEDEC] shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] rounded-bl-lg rounded-br-lg lg:rounded-tl-lg lg:rounded-br-none">
                                Reservar
                                <svg class="w-4 h-4 ms-1.5 rtl:rotate-180 -me-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4"/></svg>
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>

        </div>
    </main>
</x-layout>
