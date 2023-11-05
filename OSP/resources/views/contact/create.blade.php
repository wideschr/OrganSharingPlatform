<x-layout>

    {{-- content --}}
    <x-slot name="content">

        {{-- main screen --}}
        <div class="flex justify-center">
            <div class="flex flex-col w-full bg-white">

                {{-- page title --}}
                <x-page-title>
                    Contact
                    <x-slot name="introText">
                        Want to ask a queston or give some feedback to the Organ Sharing Platform team? <br>
                        Just write your message below and we'll come back to you as soon as possible.
                    </x-slot>
                </x-page-title>

                {{-- profile content --}}
                <section class="flex flex-col overflow-auto lg:w-4/5 mx-auto grid ">

                    <form action="/profile/edit" method="post" enctype="multipart/form-data" class="space-y-4 md:space-y-6">
                        {{-- cross-site request forgery --> generates a hidden input with a unique value that laravel will check. This makes sure that only the submitted form can go to the register page --}}
                        @csrf

                        
                        <div class="flex align-start">
                            {{-- left side --}} 
                            

                                <label for="biography"
                                    class="block mt-5 mb-2 text-sm font-medium text-gray-900 dark:text-white">Biography</label>
                                <textarea name="biography" id="biography" cols="30" rows="10"
                                    class=" w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none py-2 px-4 mb-4 bg-gray-50 rounded-lg rounded-t-lg border border-gray-300 dark:bg-gray-800 dark:border-gray-700"
                                    placeholder="Write something about yourself and your research interests..." required ></textarea>
                            </div>

                            {{-- right side --}}
                            <div class="flex flex-col w-2/5 pl-10 align-end">
                                {{-- email --}}
                                <div class="pb-3">
                                    <label for="email"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                        email</label>
                                    <input required type="email" name="email" id="email"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="name@company.com" required="" value="{{ old('email') }}">
                                    {{-- this will set the default value of the input equal to the valueit had before --}}

                                    {{-- errors are saver in $errors. @error blade can be used to display them. $message is the error message and is linked to the key wih is the input field name --}}
                                    @error('email')
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>


                                {{-- submit button --}}
                                <div class="flex flex-grow justify-center items-end">
                                    <button type="submit"
                                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg  px-5 py-2.5  dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 mt-4 ">
                                        Save changes</button>
                                </div>
                            </div>
                        </div>


                    </form>



                </section>

            </div>

        </div>



    </x-slot>


</x-layout>
