<x-layout>


    {{-- content --}}
    <x-slot name="content">

        {{-- page title --}}
        <div class="flex flex-col justify-center items-align  pt-20 pb-5 text-center bg-gray-50">
            <x-page-title>
                {{ $user->name }}
                <x-slot name="introText">
                    Welcome to the profile page of {{ $user->name }}. <br>
                    Here you can find all the information about the user and his offers.
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


                <section class="flex lg:w-4/5 mx-auto ">
                    {{-- profile content --}}

                    <form action="/profile/edit" method="post" enctype="multipart/form-data"
                        class="flex flex-col w-2/5 space-y-4 md:space-y-6 mr-10 ">

                        <h2 class="mb-4 text-left text-lg font-normal text-gray-500 lg:text-xl  dark:text-gray-400">
                            Profile</h2>

                        {{-- cross-site request forgery --> generates a hidden input with a unique value that laravel will check. This makes sure that only the submitted form can go to the register page --}}
                        @csrf

                        <div  class="pb-3">
                            <label for="profile_picture"
                                class="block  mb-5 text-sm font-medium text-gray-900 dark:text-white">Profile
                                picture</label>
                            <img  class="w-2/5"
                                src="{{ asset('storage/' . $user->profile_picture_url) }}"
                                alt="profile picture">{{-- need to create a symbolic link from public/storage to storage/app/public using the storage:link Artisan command. This command will create a symbolic link to make files in your storage/app/public directory accessible from the public directory. --}}
                        </div>

                        <div class="pb-3">
                            <label for="biography"
                            class="block mt-5 mb-2 text-sm font-medium text-gray-900 dark:text-white">Biography</label>
                        <textarea name="biography" id="biography" cols="30" rows="10" disabled
                            class=" w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none py-2 px-4 mb-4 bg-gray-50 rounded-lg rounded-t-lg border border-gray-300 dark:bg-gray-800 dark:border-gray-700"
                            placeholder="Write something about yourself and your research interests..." value="{{ $user->biography }}">{{ $user->biography }}</textarea>
                        </div>
                        


                        {{-- email --}}
                        <div class="pb-3">
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email
                                address</label>
                            <input disabled type="email" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="name@company.com" required="" value="{{ $user->email }}">
                            {{-- this will set the default value of the input equal to the valueit had before --}}
                        </div>


                        {{-- username --}}
                        <div class="pb-3">
                            <label for="username"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                            <input disabled type="username" name="username" id="username"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="piethuysentruyt69" value="{{ $user->username }}">
                        </div>

                    </form>



                    {{-- cards --}}
                    <div class="flex flex-col w-3/5 overflow-auto mx-auto ml-10">

                        <h2 class="mb-4 text-left text-lg font-normal text-gray-500 lg:text-xl  dark:text-gray-400">
                            Offers</h2>

                        {{-- cards --> send a prop with the posts --}}
                        @if ($offers->count() > 0)
                            <div class="">
                                <x-post-card :offers="$offers" :selections="$selections">

                                </x-post-card>

                                {{-- pagination --}}
                                {{ $offers->links() }}

                            </div>
                        @else
                            {{-- show active filters and clear button with message to remove filetrs --}}
                            <div class="">

                                <p class="text-left">No offers available with these selections.Try removing some of the
                                    filter selections. </p>
                            </div>
                        @endif



                    </div>

                </section>

            </div>

        </div>



    </x-slot>


</x-layout>
