<x-layout>

    {{-- content --}}
    <x-slot name="content">

        {{-- page title --}}
        <div class="flex flex-col justify-center items-align  pt-20 pb-5 text-center bg-gray-50" style="background-image:url({{ asset('images/page-background.jpg')}}) ;">
            <x-page-title>
                Create an offer
                <x-slot name="introText">
                    Great that you have an offer to share with the community. <br>
                    Fill in the fields below and if someone is interested, they will contact you.
                </x-slot>
            </x-page-title>
            <div class="w-full flex justify-center pb-20">
                <x-button-default>
                    Create your own offer
                    <x-slot name='href'>"/create-offer"</x-slot>
                </x-button-default>
            </div>
        </div>

        {{-- main screen --}}
        <div class="flex justify-center mt-10">
            <div class="flex flex-col w-full bg-white p-6 rounded-lg">

                {{-- form --}}
                <div class="grid grid-col-12  mx-auto" style="width:75%;">
                    <x-create-offer-form :allOffers="$allOffers">
                    </x-create-offer-form>
                </div>

            </div>

        </div>



    </x-slot>

</x-layout>
