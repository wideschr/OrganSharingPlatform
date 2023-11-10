<x-layout>

    {{-- content --}}
    <x-slot name="content">

        {{-- page title --}}
        <div class="flex flex-col justify-center items-align  pt-20 pb-5 text-center bg-gray-50" style="background-image:url({{ asset('images/page-background.jpg')}}) ;">
            <x-page-title>
                Admin Section
                <x-slot name="introText">
                    This is the admin panel. Here you can manage all the offers and users, as well as the FAQ questions and answers.
                </x-slot>
            </x-page-title>
        </div>

        {{-- main screen --}}
        <div class="flex justify-center mt-5">
            <div class="flex flex-col w-full bg-white p-6 rounded-lg">

                {{-- tabbed container --}}
                <div class="grid grid-col-12 mx-5 " >
                    <x-tabbed-container :users="$users" :offers="$offers" :faqs="$faqs"/>
                    
                </div>

            </div>

        </div>



    </x-slot>

</x-layout>
