
<x-layout>
    <x-slot:title>
        Mis reservas
    </x-slot>
    <main class="flex max-w-[335px] w-full flex-col-reverse lg:max-w-4xl lg:flex-row">
        <div class="text-[13px] leading-[20px] flex-1 p-6 pb-12 lg:p-20 bg-white dark:bg-[#161615] dark:text-[#EDEDEC] shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] rounded-bl-lg rounded-br-lg lg:rounded-tl-lg lg:rounded-br-none">
            <h1 class="mb-4 font-medium">MIS RESERVAS:</h1>

            <form class="mb-4 row-cols-2 d-flex" method="POST" action="{{ route('reservas.filtrar') }}">
                @csrf
                <div class="flex gap-4 mb-4">
                    <!-- Input de fecha -->
                    <div class="flex-1">
                        <input
                            type="date"
                            id="fecha"
                            name="fecha"
                            value="{{ now()->format('Y-m-d') }}"
                            class="w-full px-3 py-2 border rounded-lg dark:bg-[#1E1E1E] dark:border-gray-700"
                        >
                    </div>

                    <!-- Input de estado -->
                    <div class="flex-1">
                        <select
                            id="estado"
                            name="estado"
                            class="w-full px-3 py-2 border rounded-lg dark:bg-[#1E1E1E] dark:border-gray-700"
                        >
                            <option value="todas">Todos</option>
                            <option value="pendiente">Pendiente</option>
                            <option value="confirmada">Confirmada</option>
                            <option value="cancelada">Cancelada</option>
                        </select>
                    </div>
                    <div class="flex-1">
                        <button type="submit" class="w-full px-3 py-2 border rounded-lg dark:bg-[#1E1E1E] dark:border-gray-700"
                        >
                            Filtrar
                        </button>
                    </div>
                </div>

            </form>

            <ul class="bg-gray-300 rounded-md shadow-sm divide-y divide-gray-100 mb-4">
                @foreach($reservas as $reserva)
                    <li class="px-4 py-3 flex items-center justify-between">
                        <div class="text-sm text-gray-600">Fecha: {{$reserva->fecha}} - {{$reserva->hora}}</div>
                        <div class="text-sm text-gray-500">
                            Sala {{$reserva->sala->id}} pax {{$reserva->numpersonas}}
                        </div>
                        @php
                            $color = match($reserva->estado) {
                                'pendiente' => 'bg-yellow-500 text-white',
                                'confirmada' => 'bg-green-500 text-white',
                                'cancelada' => 'bg-red-500 text-white',
                                default => 'bg-gray-500 text-white',
                            };
                        @endphp
                        <div class="text-sm text-gray-500 px-1 {{ $color }}">
                            {{$reserva->estado}}
                        </div>
                        <div class="text-sm flex gap-4">
                            <a href="{{ route('reservas.confirmar', [ 'reserva' => $reserva->id ]) }}" class="flex-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="green" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                    <polyline points="20 6 9 17 4 12" />
                                </svg>

                            </a>
                            <a href="{{ route('reservas.cancelar', [ 'reserva' => $reserva->id ]) }}" class="flex-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="red" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
                                    <line x1="18" y1="6" x2="6" y2="18" />
                                    <line x1="6" y1="6" x2="18" y2="18" />
                                </svg>
                            </a>
                        </div>
                    </li>
                @endforeach
            </ul>

        </div>
    </main>
</x-layout>
