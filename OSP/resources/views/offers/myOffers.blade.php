<x-layout>

    {{-- content --}}
    <x-slot name="content">

        {{-- page title --}}
        <div class="flex flex-col justify-center items-align  pt-20 pb-5 text-center bg-gray-50">
            <x-page-title>
                My offers
                <x-slot name="introText">
                    On this page you get an overview of all the offers you have posted on the platform.
                </x-slot>
            </x-page-title>
            <div class="w-full flex justify-center bg-gray-50 pb-20">
                <x-button-default>
                    Create another offer
                    <x-slot name='href'>"/create-offer"</x-slot>
                </x-button-default>
            </div>
        </div>

        {{-- main screen --}}
        <div class="flex justify-center items-center mt-10">

                {{-- cards --}}
                <div class="flex flex-col w-full overflow-auto mx-auto">

                    {{-- cards --> send a prop with the posts --}}
                    @if ($offers->count() > 0)
                        <div class="flex flex-col items-center flex-grow">
                            <x-post-card :offers="$offers" :selections="$selections">

                            </x-post-card>

                            {{-- pagination --}}
                            {{ $offers->links() }}

                        </div>
                    @else
                        {{-- show active filters and clear button with message to remove filetrs --}}
                        <div class="flex flex-col items-center flex-grow">

                            <p class="text-left">No offers available with these selections.Try removing some of the
                                filter selections. </p>
                        </div>
                    @endif

                </div>


           

        </div>



    </x-slot>

</x-layout>
