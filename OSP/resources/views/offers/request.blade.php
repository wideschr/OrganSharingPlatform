<x-layout>

    {{-- content --}}
    <x-slot name="content">

        {{-- page title --}}
        <div class="flex flex-col justify-center items-align  pt-20 pb-5 text-center bg-gray-50">
            <x-page-title>
                Contact the researcher
                <x-slot name="introText">
                    Want to get some extra information from the researcher or make an agreement to use his
                    animals? <br>
                    Write your message here and we'll make sure it gets to the researcher.
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
        <div class="flex justify-center mt-10">
            <div class="flex flex-col w-full bg-white">

                <section class="grid grid-cols-5 w-4/5 mx-auto ">

                    
                    <form action="/offer/{{ $offer->id }}/request" method="post"
                        class="col-span-3 space-y-4 md:space-y-6  pr-10">

                        <h2 class="mb-4 text-left text-lg font-normal text-gray-500 lg:text-xl  dark:text-gray-400">Contact Form</h2>

                        {{-- cross-site request forgery --> generates a hidden input with a unique value that laravel will check. This makes sure that only the submitted form can go to the register page --}}
                        @csrf


                        <div class="flex flex-col align-start justify-center">

                            {{-- email --}}
                            <div class="pb-3">
                                <label for="email"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                    email adress (so they can mail you back)</label>
                                <input required type="email" name="email" id="email"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="name@company.com" value="{{ old('email') }}">
                                {{-- this will set the default value of the input equal to the valueit had before --}}

                                {{-- errors are saver in $errors. @error blade can be used to display them. $message is the error message and is linked to the key wih is the input field name --}}
                                @error('email')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- message_body --}}
                            <label for="message"
                                class="block mt-5 mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                message</label>
                            <textarea name="message" id="message" cols="30" rows="10"
                                class=" w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none py-2 px-4 mb-4 bg-gray-50 rounded-lg rounded-t-lg border border-gray-300 dark:bg-gray-800 dark:border-gray-700"
                                placeholder="What do you want to say?" required value="{{ old('message') }}"></textarea>

                            @error('message')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror

                            {{-- submit button --}}
                            <div class="flex flex-grow  items-end">
                                <button type="submit"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg  px-5 py-2.5  dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 mt-4 ">
                                    Send your message</button>
                            </div>

                        </div>


                    </form>

                    <div class="col-span-2 pl-10 mt-2">
                        <x-offer-table :offer="$offer" />
                    </div>


                </section>

            </div>

        </div>



    </x-slot>


</x-layout>
