<x-layout>

    {{-- content --}}
    <x-slot name="content">

        {{-- page title --}}
        <div class="flex flex-col justify-center items-align  pt-20 pb-5 text-center bg-gray-50">
            <x-page-title>
                Overview
                <x-slot name="introText">
                    On this page you get an overview of all the offers available on the platform. This also contains the
                    offers that are expired.
                    You can use the filters or search bar to find the offers you are looking for.
                </x-slot>
            </x-page-title>
            <div class="w-full flex justify-center bg-gray-50 pb-20">
                <x-button-default>
                    Create your own offer
                    <x-slot name='href'>"/create-offer"</x-slot>
                </x-button-default>
            </div>
        </div>

        {{-- main screen --}}
        <div class="flex justify-center  mt-10">
            <div class="flex flex-col  w-full bg-white rounded-lg">



                {{-- filters and cards --}}
                <div class="grid grid-cols-12 overflow-auto">



                    {{-- filters -> send a prop with the filter names and values --}}
                    <div class="col-span-1 "></div>
                    <div class="col-span-2 ">

                        <x-filterpanel :offers="$offers" :selections="$selections" :allOffers="$allOffers">
                        </x-filterpanel>
                    </div>
                    <div class="col-span-1 "></div>

                    {{-- cards --> send a prop with the posts --}}



                    @if ($offers->count() > 0)
                        <div class="col-span-7">
                            <x-post-card :offers="$offers" :selections="$selections">

                            </x-post-card>

                            {{-- pagination --}}
                            {{ $offers->links() }}

                        </div>
                    @else
                        {{-- show active filters and clear button with message to remove filetrs --}}
                        <div class="col-span-6">
                            <x-active-filters :selections="$selections">
                            </x-active-filters>
                            <p class="text-left">No offers available with these selections.Try removing some of the
                                filter selections. </p>
                        </div>
                    @endif


                    <div class="col-span-1 "></div>

                </div>


            </div>

        </div>



    </x-slot>

</x-layout>
