<x-layout>

        <x-slot:title>

            Mis Reservas

        </x-slot>
    <main class="flex max-w-[335px] w-full flex-col-reverse lg:max-w-4xl lg:flex-row">
        <div class="text-[13px] leading-[20px] flex-1 p-6 pb-12 lg:p-20 bg-white dark:bg-[#161615] dark:text-[#EDEDEC] shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] rounded-bl-lg rounded-br-lg lg:rounded-tl-lg lg:rounded-br-none">
            <h1 class="mb-1 font-medium">MIS RESERVAS: </h1>

            <ul class="flex gap-3 text-sm leading-normal">
              @foreach($reservas as $reserva)
              <li>
                  {{$reserva->fecha}} -   {{$reserva->hora}} -   {{$reserva->sala->id}} -   {{$reserva->numpersonas}} -
                  {{$reserva->telefono}} -  {{$user->email}}
                  <div class="text-sm text-gray-600">
                      <a href="">Cancelar</a>
                  </div>
              </li>
              @endforeach
            </ul>
            <x-button_w link="{{route('nueva_reserva')}}" texto="Haz una reserva ahora"/>
        </div>


    </main>
</x-layout>
