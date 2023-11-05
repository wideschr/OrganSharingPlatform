<x-layout>

    {{-- content --}}
    <x-slot name="content">

        {{-- main screen --}}
        <div class="flex justify-center">
            <div class="flex flex-col w-full bg-white p-6 rounded-lg">

                {{-- page title --}}
                <x-page-title>
                    Create an offer
                    <x-slot name="introText">
                        Great that you have an offer to share with the community. <br>
                        Fill in the fields below and if someone is interested, they will contact you.
                    </x-slot>
                </x-page-title>


                {{-- form --}}
                <div class="grid grid-col-12  mx-auto" style="width:75%;">
                    <x-create-offer-form :allOffers="$allOffers">
                    </x-create-offer-form>
                </div>

            </div>

        </div>



    </x-slot>

</x-layout>
