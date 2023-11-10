<footer class="bg-gray-100  rounded-xl text-center py-16 px-10 mt-16" style="background-image:url({{ asset('images/page-background.jpg')}}) ;">
    <h5 class="text-3xl text-white">Stay in touch with the latest offers</h5>
    <p class="text-sm mt-3  text-white">Promise to keep the inbox clean. No bugs.</p>

    <div class="mt-10">
        <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

            {{-- form --}}
            <form method="POST" action="/subscribe" class="lg:flex text-sm">

                @csrf

                <div class="lg:py-3 lg:px-5 flex items-center">
                    <label for="email" class="hidden lg:inline-block">
                        <img src="/images/placeholder.png" alt="mailbox letter" style="width: 25px;">
                    </label>

                    <input  id="email" 
                            type="text" 
                            placeholder="Your email address"
                            name="email"
                            class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">
                </div>

                <button type="submit"
                        class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8"
                >
                    Subscribe
                </button>
            </form>
        </div>
    </div>

    <p class="mt-10 text-sm text-center text-gray-100 dark:text-gray-400 sm:mb-0">
        &copy; 2023 <a href="https://www.linkedin.com/in/wito-de-schrijver-a52872120/" class="hover:underline" target="_blank">Wito De Schrijver</a>. All rights reserved.
    </p>
</footer>