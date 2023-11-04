<x-layout>


    {{-- content --}}
    <x-slot name="content">

        {{-- main screen --}}
        <div class="flex justify-center">
            <div class="flex flex-col w-full bg-white p-6 rounded-lg">

                {{-- offer details --}}
                <section class="flex flex-col overflow-auto lg:w-4/5 mx-auto grid border border-green-200">

                    

                    {{-- page title --}}
                    <x-page-title>
                        Offer Details
                        <x-slot name="introText">
                            On this page you can find all the details about the offer. If you are interested in this offer, you can make a request.
                            Finally, you can also participate in the discussion about this offer.
                        </x-slot>
                    </x-page-title>

                    {{-- description and details block --}}
                    <div class="grid grid-cols-12">

                        <div class="col-span-6">
                            {{-- description --}}
                            <div class="flex flex-col items-start justify-start ">
                                <h2 class="mb-2 mx-auto text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-400">Description</h2>
                                <p class=" text-center leading-relaxed">{{$offer->description}}</p>
    
    
                                {{-- buttons --}}
                                <div class="flex mb-40 mx-auto">
                                    <div class="flex items-center"> {{-- This div is here because the default button is aligned at justify-end, which is not what we want. --}}
                                        {{-- CTA --}}
                                        <x-button-default>
                                            <x-slot name='href'>"offer/{{ $offer->slug }}"</x-slot>
                                            Make request
                                        </x-button-default>
    
                                        {{-- bookmark button --}}
                                        {{-- <button class="rounded-full w-10 h-10 bg-gray-200 p-0 border-0 inline-flex items-center justify-center text-gray-500 ml-4">
                                                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                                    <path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"></path>
                                                </svg>
                                            </button> --}}
                                    </div>
                                </div>
                            </div>
                            

                            {{-- discussion -> only if logged in--}}
                            <h2 class="mb-2 mx-auto text-center text-lg font-normal text-gray-500 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-400">Discussion</h2>
                            @if (auth()->check())
                                <x-offer-comments-post :comments="$comments" :offer="$offer"/>
                            @else
                                <p class="text-center">Log in to participate in the discussion</p>
                            @endif
                            

                        </div>

                        <div class="col-span-1"></div>

                        {{-- details table --}}
                        <div class="col-span-5">
                            <x-offer-table :offer="$offer" />
                        </div>

                    </div>



                </section>

            </div>

        </div>



    </x-slot>


</x-layout>
