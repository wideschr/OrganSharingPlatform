<x-layout>

    {{-- content --}}
    <x-slot name="content">

        {{-- page title --}}
        <div class="flex flex-col justify-center items-align  pt-20 pb-5 text-center bg-gray-50" style="background-image:url({{ asset('images/page-background.jpg')}}) ;">
            <x-page-title>
                Edit your offer
                <x-slot name="introText">
                    Want to update some of the details about this offer? <br>
                    Make the changes here and make sure to hit that save button!
                </x-slot>
            </x-page-title>
            <div class="w-full flex justify-center pb-20">
                <x-button-default>
                    Create another offer
                    <x-slot name='href'>"/create-offer"</x-slot>
                </x-button-default>
            </div>
        </div>

        {{-- main screen --}}
        <div class="flex justify-center mt-10">
            <div class="flex flex-col w-full bg-white p-6 rounded-lg">
                {{-- back button --}}
                <div class="mx-auto mb-5" style="width:75%;">
                    <x-button-alternative>
                        
                        <a href="javascript:history.back()">
                            <div class="flex align-center justify-center">
                                < Back
                            </div>
                        </a>
                        
                    </x-button-alternative>
                </div>
                {{-- form --}}
                <div class="grid grid-col-12  mx-auto" style="width:75%;">
                    <x-edit-offer-form :originalOffer="$originalOffer" :allOffers="$allOffers">
                    </x-edit-offer-form>
                </div>

            </div>

        </div>



    </x-slot>

</x-layout>
