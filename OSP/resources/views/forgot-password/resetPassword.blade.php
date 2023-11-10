<x-layout>

    {{-- content --}}
    <x-slot name="content">

        {{-- page title --}}
        <div class="flex flex-col justify-center items-align pt-10 pb-10 pt-20 text-center bg-gray-50" style="background-image:url({{ asset('images/page-background.jpg')}}) ;">
            <x-page-title>
                Reset Password
                <x-slot name="introText">
                    Reset your password by filling in the fields below and clicking the button.
                </x-slot>
            </x-page-title>
        </div>

        {{-- main screen --}}
        <div class="flex flex-col justify-center  mt-10">
            <div class="flex flex-col w-full bg-white">

                <section class="flex flex-col overflow-auto lg:w-1/5 mx-auto grid ">


                    <form action="/password/reset/{{$email}}" method="post" class="space-y-4 md:space-y-6">
                        {{-- cross-site request forgery --> generates a hidden input with a unique value that laravel will check. This makes sure that only the submitted form can go to the register page --}}
                        @csrf


                        <div class="flex flex-col align-start justify-center ">

                            {{-- email --}}
                            <div class="pb-3">

                                <div class="mb-5">
                                    <label for="email"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                        email</label>
                                    <input required type="email" name="email" id="email"
                                        class="bg-gray-50 border border-gray-300 text-gray-500 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        value="{{ $email }}" disabled>

                                    {{-- errors are saver in $errors. @error blade can be used to display them. $message is the error message and is linked to the key wih is the input field name --}}
                                    @error('email')
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>



                                {{-- password --}}
                                <div class="mb-5">
                                    <label for="password"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                    <input required type="password" name="password" id="password"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required="">

                                    {{-- errors are saver in $errors. @error blade can be used to display them. $message is the error message and is linked to the key wih is the input field name --}}
                                    @error('password')
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="mb-5">
                                    <label for="password_confirmation"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm
                                        password</label>
                                    <input required type="password" name="password_confirmation"
                                        id="password_confirmation"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        required="">
                                </div>


                            </div>

                            {{-- submit button --}}
                            <div class="flex flex-grow justify-center items-end">
                                <button type="submit"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg  px-5 py-2.5  dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 mt-4 ">
                                    Reset password</button>
                            </div>

                        </div>


                    </form>



                </section>

            </div>

        </div>



    </x-slot>


</x-layout>
