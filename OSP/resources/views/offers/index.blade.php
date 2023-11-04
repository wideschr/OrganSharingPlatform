<x-layout>

    {{-- content --}}
    <x-slot name="content">

        {{-- main screen --}}
        <div class="flex justify-center">
            <div class="flex flex-col w-full bg-white p-6 rounded-lg">

                {{-- page title --}}
                <x-page-title>
                    Offers
                    <x-slot name="introText">
                        lorem ipsum dolor est. lorem ipsum dolor est. lor lorem ipsum dolor est. lorem ipsum dolor est.
                        lorem ipsum dolor est. lorem ipsum dolor est. lorem ipsum dolor est.
                    </x-slot>
                </x-page-title>



                {{-- filters and cards --}}
                <div class="grid grid-cols-12 overflow-auto">

                    {{-- search bar on one line --}}
                    <x-searchbar />

                    {{-- filters -> send a prop with the filter names and values --}}
                    <div class="col-span-1 "></div>
                    <div class="col-span-2 ">
                        <x-filterpanel  :offers="$offers" :selections="$selections"  :allOffers="$allOffers">
                        </x-filterpanel>
                    </div>
                    <div class="col-span-1 "></div>

                    {{-- cards --> send a prop with the posts --}}
                    @if ($offers->count() > 0)
                        <div class="col-span-7">
                            <x-post-card :offers="$offers" :selections="$selections">

                            </x-post-card>

                            {{-- pagination --}}
                            {{$offers->links()}}

                        </div>
                    @else
                        {{-- show active filters and clear button with message to remove filetrs --}}
                        <div class="col-span-6">
                            <x-active-filters :selections="$selections">
                            </x-active-filters>
                            <p class="text-left">No offers available with these selections.Try removing some of the filter selections. </p>
                        </div>
                        

                    @endif
                    
                    
                    <div class="col-span-1 "></div>

                </div>


            </div>

        </div>



    </x-slot>

</x-layout>
