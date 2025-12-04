<x-layout>


        <x-slot:title>

           Nueva Reserva

        </x-slot>
    <main class="flex max-w-[335px] w-full flex-col-reverse lg:max-w-4xl lg:flex-row">
        <div class="text-[13px] leading-[20px] flex-1 p-6 pb-12 lg:p-20 bg-white dark:bg-[#161615] dark:text-[#EDEDEC] shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] rounded-bl-lg rounded-br-lg lg:rounded-tl-lg lg:rounded-br-none">
            <h1 class="mb-1 font-medium">Nueva Reserva: </h1>
            <form method="POST" action="{{ route('reservas.buscar') }}" class="space-y-4">
                @csrf
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <!-- Fecha -->
                <x-input label="Fecha" type="date" name="fecha" required />

                <!-- Hora -->
                <div>
                    <label class="block text-sm font-medium mb-1" for="hora">Hora</label>
                    <select name="hora" id="hora" required class="w-full px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-lg bg-white dark:bg-[#1c1c1c] text-black dark:text-white focus:outline-none focus:ring-2 focus:ring-gray-800">
                        <option value="">Selecciona una hora</option>
                        <option value="09:00">09:00</option>
                        <option value="10:00">10:00</option>
                        <option value="11:00">11:00</option>
                        <option value="12:00">12:00</option>
                    </select>
                </div>

                <!-- Número de personas -->
                <x-input label="Número de personas" type="number" name="personas" placeholder="2" required />
                <x-input label="Teléfono de contacto" type="tel" name="telefono" placeholder="986325444" required />

                <!-- Botón -->
                <button type="submit" class="w-full bg-black text-white py-2 rounded-lg hover:bg-gray-800 transition">
                    Buscar
                </button>
            </form>
        </div>



    </main>
</x-layout>
