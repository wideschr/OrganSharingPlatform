<nav class="md:flex md:justify-between md:items-center my-3 w-4/5 mx-auto" 
style="background-image:url({{ asset('images/page-background.jpg')}}) ; background-position:  center; background-size: 150%; ">
    {{-- logo --}}
    <div class="">
        <a href="/">
            <img class="h-10 " src="/images/placeholder.png" alt="OSP Logo">
        </a>
    </div>

    {{-- title --}}
    <a href="/" class="flex-grow text-gray-100 ml-10  ">
        <h1 class="text-2xl uppercase flex-grow">Organ Sharing Platform</h1>
    </a>

    {{-- links --}}
    <div class="flex items-center">
        {{-- make links blue when active route --}}
        <a href="/"
            class=" border-b-2 border-transparent text-medium text-gray-100 uppercase mx-7 pt-1 {{ request()->is('/') ? 'font-bold text-white' : '' }}">Offers
            & Requests</a>
        <a href="/about"
            class=" border-b-2 border-transparent text-medium  text-gray-100 uppercase mx-7 pt-1 {{ request()->is('about') ? 'font-bold text-white' : '' }}">About</a>
        <a href="/faq"
            class="border-b-2 border-transparent text-medium  text-gray-100 uppercase mx-7 pt-1 {{ request()->is('faq') ? 'font-bold text-white' : '' }}">FAQ</a>
        <a href="/contact"
            class=" border-b-2 border-transparent text-medium  text-gray-100 uppercase mx-7 pt-1 {{ request()->is('contact') ? 'font-bold text-white' : '' }}">Contact</a>

        {{-- if authenticated --}}
        @if (auth()->check())


            <div class="relative " id="user-menu">
                <a href="#" class=" border-b-2 border-transparent text-medium  text-gray-100 uppercase mx-7 pt-1 ">
                    {{ auth()->user()->username }}
                    <i class="fas fa-chevron-down"></i> <!-- Dropdown arrow -->
                </a>
                <div class="absolute right-0 mt-2 w-48 rounded-md shadow-lg  bg-white ring-1 ring-black ring-opacity-5 hidden"
                    role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button">
                    @if (auth()->user()->is_admin)
                        <a href="/admin"
                            class="border-b-2 border-transparent text-gray-100 block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                            role="menuitem">Admin</a>
                    @endif
                    <a href="/my-offers/{{ auth()->user()->id }}"
                        class="border-b-2 border-transparent block px-4 py-2 text-sm  text-gray-500 hover:bg-gray-100">My
                        Offers</a>
                    <a href="/profile"
                        class="border-b-2 border-transparent block px-4 py-2 text-sm  text-gray-500 hover:bg-gray-100"
                        role="menuitem">Profile</a>
                    <a href="/logout"
                        class="border-b-2 border-transparent block px-4 py-2 text-sm  text-gray-500 hover:bg-gray-100"
                        role="menuitem">Logout</a>
                </div>
            </div>

        @endif


        {{-- if guest (not authenticated) --}}
        @if (!auth()->check())

            <a href="/register"
                class=" border-b-2 border-transparent text-medium text-gray-100 uppercase mx-7 pt-1 {{ request()->is('register') ? 'font-bold text-white' : '' }}">Register</a>
            <a href="/login"
                class="border-b-2 hover:bg-blue-800 border-transparent bg-blue-700 ml-3 rounded-full text-xs font-semibold text-white uppercase focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900  py-3 px-5">
                log in
            </a>
        @endguest

</div>
</nav>

<script>
    //underline the links when hovered over
    const links = document.querySelectorAll('a');
    links.forEach(link => {
        link.addEventListener('mouseover', () => {
            link.classList.replace('border-transparent', 'border-gray-100');
        });
        link.addEventListener('mouseout', () => {
            link.classList.replace('border-gray-100', 'border-transparent');
        });
    });


    //toggle the user menu
    document.getElementById('user-menu').addEventListener('click', function() {
        var dropdown = this.querySelector('[role="menu"]');
        dropdown.classList.toggle('hidden');
    });
</script>
