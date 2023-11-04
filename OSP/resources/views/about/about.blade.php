<x-layout>

    {{-- content --}}
    <x-slot name="content">

        {{-- main screen --}}
        <div class="flex justify-center">
            <div class="flex flex-col w-full bg-white p-6 rounded-lg">

                {{-- page title --}}
                <x-page-title>
                    About
                    <x-slot name="introText">
                        On this page you can learn all about the Organ collection platform and how to use it.
                        It also contains references to the technologies/sources/inspiration used to build the platform.
                    </x-slot>
                </x-page-title>



                
                <div class="grid grid-cols-12 overflow-auto">

                    gimme content

                </div>


            </div>

        </div>



    </x-slot>

</x-layout>