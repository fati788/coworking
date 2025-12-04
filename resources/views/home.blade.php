<x-layout>
    <main class="flex max-w-[335px] w-full flex-col-reverse lg:max-w-4xl lg:flex-row">
        <div class="text-[13px] leading-[20px] flex-1 p-6 pb-12 lg:p-20 bg-white dark:bg-[#161615] dark:text-[#EDEDEC] shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] rounded-bl-lg rounded-br-lg lg:rounded-tl-lg lg:rounded-br-none">
            <h1 class="mb-1 font-medium">BIENVENIDO APP COWORKING</h1>
            <p class="mb-2 text-[#706f6c] dark:text-[#A1A09A]">Reserva tu sala ahora</p>
            <ul class="flex gap-3 text-sm leading-normal">
                <li>
                    @if(auth()->user()->admin)
                        <a href="{{route('reservas.pendientes')}}"  class="inline-block dark:bg-[#eeeeec] dark:border-[#eeeeec] dark:text-[#1C1C1A] dark:hover:bg-white dark:hover:border-white hover:bg-black hover:border-black px-5 py-1.5 bg-[#1b1b18] rounded-sm border border-black text-white text-sm leading-normal">
                            Ver todas las reservas pendiente
                        </a>


                    @else
                        <a href="{{route('reservas.nueva')}}"  class="inline-block dark:bg-[#eeeeec] dark:border-[#eeeeec] dark:text-[#1C1C1A] dark:hover:bg-white dark:hover:border-white hover:bg-black hover:border-black px-5 py-1.5 bg-[#1b1b18] rounded-sm border border-black text-white text-sm leading-normal">
                            Reserva ahora
                        </a>

                    @endif
                </li>
            </ul>
        </div>
    </main>
</x-layout>
