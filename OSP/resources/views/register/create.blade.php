<x-layout>


    {{-- content --}}
    <x-slot name="register" >

        <section class="bg-gray-50">
            <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
                <a href="#" class="flex text-blue-700 justify-center items-center mb-6 text-2xl font-semibold text-gray-900 dark:text-white">
                    <img class="pr-5" style="height:5rem" src="/images/logo-no-background.png" alt="logo">
                    Organ Sharing Platform (OSP)
                </a>

                <div
                    class="  bg-white rounded-lg shadow dark:border md:mt-0 w-3/5 xl:p-0 dark:bg-gray-800 dark:border-gray-700 mx-auto">
                    <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                        <h1
                            class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                            Create an account
                        </h1>

                        <!--
                        1. The form includes fields for username, password, and password confirmation.
                        2. Each field is wrapped in a div, with a label and an input element.
                        3. The 'required' attribute is used to ensure that the user fills in all fields.
                        4. The password and password confirmation fields are of type 'password', which hides the input.
                        5. The 'password_confirmation' field is used to confirm that the user has entered their password correctly. laravel does this autom. but required to name it _confirmation
                        6. Styling is applied to the input fields using Tailwind CSS classes.
                        7. The form also includes a checkbox for the user to agree to the terms and conditions.
                        -->
                        <form action="/register" method="post" enctype="multipart/form-data" class="space-y-4 md:space-y-6">

                            {{-- cross-site request forgery --> generates a hidden input with a unique value that laravel will check. This makes sure that only the submitted form can go to the register page --}}
                            @csrf
                            <div class="flex">
                                {{-- left side --}}
                                <div class="flex flex-col pr-10 flex-grow">
                                    {{-- email --}}
                                    <div>
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

                                    {{-- name --}}
                                    <div>
                                        <label for="name"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                            name</label>
                                        <input required type="name" name="name" id="name"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Piet Huysentruyt" required="" value="{{ old('name') }}">

                                        {{-- errors are saver in $errors. @error blade can be used to display them. $message is the error message and is linked to the key wih is the input field name --}}
                                        @error('name')
                                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    {{-- username --}}
                                    <div>
                                        <label for="username"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                            username</label>
                                        <input required type="username" name="username" id="username"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="piethuysentruyt69" required=""
                                            value="{{ old('username') }}">

                                        {{-- errors are saver in $errors. @error blade can be used to display them. $message is the error message and is linked to the key wih is the input field name --}}
                                        @error('username')
                                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    {{-- password --}}
                                    <div>
                                        <label for="password"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                        <input required type="password" name="password" id="password"
                                            placeholder="••••••••"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            required="">

                                        {{-- errors are saver in $errors. @error blade can be used to display them. $message is the error message and is linked to the key wih is the input field name --}}
                                        @error('password')
                                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="password_confirmation"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm
                                            password</label>
                                        <input required type="password" name="password_confirmation"
                                            id="password_confirmation" placeholder="••••••••"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            required="">
                                    </div>
                                </div>

                                {{-- right side --}}
                                <div class="flex flex-col justify-between pl-10 flex-grow">
                                    {{-- biography --}}
                                    <div>
                                        <label for="biography"
                                            class="block  mb-2 text-sm font-medium text-gray-900 dark:text-white">Biography</label>
                                        <textarea name="biography" id="biography" cols="30" rows="10"
                                            class=" w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none py-2 px-4 mb-4 bg-gray-50 rounded-lg rounded-t-lg border border-gray-300 dark:bg-gray-800 dark:border-gray-700"
                                            placeholder="Write something about yourself and your research interests. You can also add this in the profile section later."
                                            value="{{ old('biography') }}"></textarea>
                                        {{-- errors are saver in $errors. @error blade can be used to display them. $message is the error message and is linked to the key wih is the input field name --}}
                                        @error('biography')
                                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    {{-- profile picture --}}
                                    <div>
                                        <label for="profile_picture"
                                            class="block  mb-2 text-sm font-medium text-gray-900 dark:text-white">Profile
                                            picture</label>

                                        <input type="file" name="profile_picture" id="profile_picture"
                                            class="mt-2">
                                        
                                        @error('profile_picture')
                                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>



                            {{-- submit button --}}
                            <button type="submit"
                                class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5  dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 mt-4 ">Create
                                an account</button>
                            <p class="text-sm text-center font-light text-gray-500 dark:text-gray-400">
                                Already have an account? <a href="/login"
                                    class="font-medium text-primary-600 hover:underline dark:text-primary-500">Login
                                    here</a>
                            </p>



                        </form>

                    </div>
                </div>

            </div>
        </section>

    </x-slot>

</x-layout>
