<x-layout>

    {{-- content --}}
    <x-slot name="content">

        {{-- page title --}}
        <div class="flex flex-col justify-center items-align  pt-20 pb-5 text-center bg-gray-50" style="background-image:url({{ asset('images/page-background.jpg')}}) ;">
            <x-page-title>
                Frequently Asked Questions (FAQ)
                <x-slot name="introText">
                    Any questions around this platform? We have the answers!
                    Browse around on this page and there's a big chance your question will already be answered. If not, head over to our contact page!
                </x-slot>
            </x-page-title>
            <div class="w-full flex justify-center pb-20">
                <x-button-default>
                    Go to the contact form
                    <x-slot name='href'>"/contact"</x-slot>
                </x-button-default>
            </div>
        </div>

        {{-- main screen --}}
        <div class="flex justify-center  mt-10">
            <div class="flex flex-col  w-3/5 bg-white rounded-lg">

                <x-faq-accordeon :faqs="$faqs"/>

            </div>

        </div>



    </x-slot>

</x-layout>
