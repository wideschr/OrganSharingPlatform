@props(['offers', 'selections'])

<?php

?>

<div class="grid  ">

    {{-- active filters panel and clear filters button --}}
    @if ($selections ?? false)
        <x-active-filters :selections="$selections">
        </x-active-filters>
    @endif

    {{-- cards --}}
    @foreach ($offers as $offer => $offerInfo)
        <article>
            <a href="/offer/{{ $offerInfo['id'] }}">
                <div
                    class="flex flex-col items-start bg-white border border-gray-200 rounded-lg shadow md:flex-row dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 w-full justify-self-center mb-10 px-7 py-4">
                    <div class="flex flex-col flex-grow">
                        <div class="flex justify-between">
                            {{-- Card content --}}
                            <div class="flex  flex-col justify-center pl-4 py-2 pr-10 leading-normal flex-grow">
                                <div class="flex items-center mb-4">
                                    {{-- title --}}
                                    <div class="flex justify-between items-center">
                                        <h5 class=" text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                            {{ ucwords($offerInfo['species']->name) }} -
                                            {{ ucwords($offerInfo['strain']) }}
                                        </h5>
                                    </div>

                                    {{-- badge --}}
                                    <x-card-badges :offer="$offerInfo"> </x-card-badges>
                                </div>


                                {{-- info --}}
                                <div>
                                    <div class="flex items-center  my-1">
                                        <img class="object-fit w-1/4 rounded-t-lg h-5 md:h-auto md:w-8 md:rounded-none md:rounded-l-lg mr-3 p-0.5"
                                            src="/images/icon_genetics_black.png" alt="">
                                        <p class="font-normal text-gray-700 dark:text-gray-400">
                                            {{ $offerInfo->genetics }}
                                        </p>
                                    </div>

                                    <div class="flex items-center  my-1">
                                        <img class="object-fit w-1/4 rounded-t-lg h-5 md:h-auto md:w-8 md:rounded-none md:rounded-l-lg mr-3 p-0.5"
                                            src="/images/icon_organisation_black.png" alt="">
                                        <p class="font-normal text-gray-700 dark:text-gray-400">
                                            {{ $offerInfo->organisation }}</p>
                                    </div>

                                    <div class="flex items-center  my-1">
                                        <img class="object-fit w-1/4 rounded-t-lg h-5 md:h-auto md:w-8 md:rounded-none md:rounded-l-lg mr-3 p-0.5"
                                            src="/images/icon_amount_black.png" alt="">
                                        <p class=" font-normal text-gray-700 dark:text-gray-400">
                                            {{ $offerInfo->amount }}
                                        </p>
                                    </div>

                                    <div class="flex items-center my-1">
                                        <img class="object-fit w-1/4 rounded-t-lg h-5 md:h-auto md:w-8 md:rounded-none md:rounded-l-lg mr-3 p-0.5"
                                            src="/images/icon_organs_black.png" alt="">
                                        <p class=" font-normal text-gray-700 dark:text-gray-400">Removed organs:
                                            {{ $offerInfo->removed_organs }}</p>
                                    </div>
                                </div>



                            </div>


                            {{-- right panel of card --}}
                            <div class="flex flex-col justify-between items-end mb-3">
                                {{-- user --}}
                                <div class="flex items-center mb-4">

                                    <img class="object-fit w-1/4 rounded-t-lg h-15 md:h-auto md:w-8 md:rounded-none md:rounded-l-lg m-2 pr-2"
                                        src="{{ asset('storage/' . $offerInfo->user->profile_picture_url) }}"
                                        alt="">

                                    @if (auth()->check())
                                        <a href="/profile/{{ $offerInfo->user->username }}"
                                            class="inline-block flex-grow text-base font-semibold text-blue-700 dark:text-gray-400 cursor-pointer underline">
                                            {{ $offerInfo->user->username }}
                                        </a>
                                    @endif

                                    @if (!auth()->check())
                                        <p
                                            class="inline-block flex-grow text-base font-semibold text-blue-700 dark:text-gray-400 cursor-pointer underline">
                                            {{ $offerInfo->user->username }}
                                        </p>
                                    @endif

                                </div>

                                {{-- icons --}}
                                <x-card-icons :offer="$offerInfo">

                                </x-card-icons>


                            </div>
                        </div>

                        {{-- CTA --}}
                        <div class="flex flex-grow justify-end items-center">

                            <x-button-default>
                                <x-slot name='href'>"/offer/{{ $offerInfo['id'] }}"</x-slot>
                                View offer
                            </x-button-default>

                            @if ((auth()->check() && auth()->user()->id == $offerInfo->user->id)||(auth()->check() && auth()->user()->is_admin == 1))
                                <x-button-alternative>
                                    <a href="/offer/{{ $offerInfo['id'] }}/update">
                                        <img src="/images/icon_edit_black.png" alt="" style="max-width:1.5rem">
                                    </a>
                                </x-button-alternative>

                                <x-button-red>
                                    <x-slot name='href'>"/offer/{{ $offerInfo['id'] }}/delete"</x-slot>
                                    <img src="/images/icon_delete_black.png" alt="" style="max-width:1.5rem">
                                </x-button-red>
                            @endif


                        </div>

                    </div>
                </div>
            </a>
        </article>
    @endforeach
</div>
