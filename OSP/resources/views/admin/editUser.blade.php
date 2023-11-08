<x-layout>


    {{-- content --}}
    <x-slot name="content">

        {{-- main screen --}}
        <div class="flex justify-center mt-10">
            <div class="flex flex-col w-full bg-white">

                {{-- profile content --}}
                <section class="flex flex-col overflow-auto lg:w-4/5 mx-auto grid ">

                    {{-- back button --}}
                    <div class="mb-10 -pl-5" style="width:100%;">
                        <x-button-alternative>

                            <a href="/admin">
                                <div class="flex align-center justify-center">
                                    < Back </div>
                            </a>

                        </x-button-alternative>
                    </div>

                    <form action="/admin/{{$user->id}}/edit" method="post" enctype="multipart/form-data"
                        class="space-y-4 md:space-y-6">
                        {{-- cross-site request forgery --> generates a hidden input with a unique value that laravel will check. This makes sure that only the submitted form can go to the register page --}}
                        @csrf


                        <div class="flex align-start">
                            {{-- left side --}}
                            {{-- need to create a symbolic link from public/storage to storage/app/public using the storage:link Artisan command. This command will create a symbolic link to make files in your storage/app/public directory accessible from the public directory. --}}
                            <div class="w-1/2 pr-10 ">
                                <div class="w-1/5">
                                    <label for="profile_picture"
                                        class="block  mb-5 text-sm font-medium text-gray-900 dark:text-white">Profile
                                        picture</label>
                                    <img src="{{ asset('storage/' . $user->profile_picture_url) }}"
                                        alt="profile picture">{{-- need to create a symbolic link from public/storage to storage/app/public using the storage:link Artisan command. This command will create a symbolic link to make files in your storage/app/public directory accessible from the public directory. --}}
                                    <input type="file" name="profile_picture" id="profile_picture" class="mt-5 mb-5">
                                </div>


                                <label for="biography"
                                    class="block mt-5 mb-2 text-sm font-medium text-gray-900 dark:text-white">Biography</label>
                                <textarea name="biography" id="biography" cols="30" rows="10"
                                    class=" w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none py-2 px-4 mb-4 bg-gray-50 rounded-lg rounded-t-lg border border-gray-300 dark:bg-gray-800 dark:border-gray-700"
                                    placeholder="Write something about yourself and your research interests..." value="{{ $user->biography }}">{{ $user->biography }}</textarea>
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
                                        placeholder="name@company.com" required="" value="{{ $user->email }}">
                                    {{-- this will set the default value of the input equal to the valueit had before --}}

                                    {{-- errors are saver in $errors. @error blade can be used to display them. $message is the error message and is linked to the key wih is the input field name --}}
                                    @error('email')
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- name --}}
                                <div class="py-3">
                                    <label for="name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                        name</label>
                                    <input required type="name" name="name" id="name"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Piet Huysentruyt" required="" value="{{ $user->name }}">

                                    {{-- errors are saver in $errors. @error blade can be used to display them. $message is the error message and is linked to the key wih is the input field name --}}
                                    @error('name')
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- username --}}
                                <div class="py-3">
                                    <label for="username"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                        username</label>
                                    <input required type="username" name="username" id="username"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="piethuysentruyt69" required="" value="{{ $user->username }}">

                                    {{-- errors are saver in $errors. @error blade can be used to display them. $message is the error message and is linked to the key wih is the input field name --}}
                                    @error('username')
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- password --}}
                                <div class="py-3">
                                    <label for="password"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                    <input type="password" name="password" id="password" placeholder="••••••••"
                                        autocomplete="off"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                    {{-- errors are saver in $errors. @error blade can be used to display them. $message is the error message and is linked to the key wih is the input field name --}}
                                    @error('password')
                                        <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="py-3">
                                    <label for="password_confirmation"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm
                                        password</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                        placeholder="••••••••" autocomplete="off"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                </div>

                                <div>
                                    <label for="is_admin"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Admin
                                        rights</label>
                                    <select name="is_admin" id="is_admin"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="0" @if ($user->is_admin == 0) selected @endif>No</option>
                                        <option value="1" @if ($user->is_admin == 1) selected @endif>Yes</option>
                                    </select>
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
