<!-- Modal toggle -->
<button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
    class=" px-5 py-2.5 mx-1  align-center text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
    type="button">
    + create user
</button>

<!-- Main modal -->
<div id="authentication-modal" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button"
                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                data-modal-hide="authentication-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 ">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Create a user</h3>


                <form class="space-y-6" action="/admin/create-user" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="flex">
                        {{-- left side --}}
                        <div class="flex flex-col pr-10 flex-grow space-y-4">
                            {{-- email --}}
                            <div>
                                <label for="email"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                    email</label>
                                <input required type="email" name="email" id="email"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="name@company.com" >
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
                                    placeholder="Piet Huysentruyt" ">

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
                                    placeholder="piethuysentruyt69" >

                                {{-- errors are saver in $errors. @error blade can be used to display them. $message is the error message and is linked to the key wih is the input field name --}}
                                @error('username')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- password --}}
                            <div>
                                <label for="password"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                <input required type="password" name="password" id="password" placeholder="••••••••"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    >

                                {{-- errors are saver in $errors. @error blade can be used to display them. $message is the error message and is linked to the key wih is the input field name --}}
                                @error('password')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="password_confirmation"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm
                                    password</label>
                                <input required type="password" name="password_confirmation" id="password_confirmation"
                                    placeholder="••••••••"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    >
                            </div>
                        </div>

                        {{-- right side --}}
                        <div class="flex flex-col justify-between pl-10 flex-grow space-y-4">
                            {{-- biography --}}
                            <div>
                                <label for="biography"
                                    class="block  mb-2 text-sm font-medium text-gray-900 dark:text-white">Biography</label>
                                <textarea name="biography" id="biography" cols="30" rows="10"
                                    class=" w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none py-2 px-4 mb-4 bg-gray-50 rounded-lg rounded-t-lg border border-gray-300 dark:bg-gray-800 dark:border-gray-700"
                                    placeholder="Write something about yourself and your research interests. You can also add this in the profile section later."
                                    ></textarea>
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

                                <input type="file" name="profile_picture" id="profile_picture" class="mt-2">

                                @error('profile_picture')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- is_admin --}}
                            <div>
                                <label for="is_admin"
                                    class="block  mb-2 text-sm font-medium text-gray-900 dark:text-white">Is
                                    admin?</label>
                                <input type="radio" name="is_admin" id="no" checked> <label for="no">No</label> <br>
                                <input type="radio" name="is_admin" id="yes"> <label for="yes">Yes</label>

                                @error('is_admin')
                                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>


                    {{-- submit --}}
                    <button type="submit"
                        class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Create user</button>
                    
                </form>
            </div>
        </div>
    </div>
</div>
