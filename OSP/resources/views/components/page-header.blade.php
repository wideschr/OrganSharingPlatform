<nav class="md:flex md:justify-between md:items-center my-5 mx-20">
    {{-- logo --}}
    <div>
        <a href="/">
            <img class="object-fit w-1/4 rounded-t-lg h-5 md:h-auto md:w-12 md:rounded-none md:rounded-l-lg" src="images/placeholder.png" alt="OSP Logo" width="165" height="16">
        </a>
    </div>

    {{-- title --}}
    <h1 class="ml-10 text-xl flex-grow">Organ Sharing Platform</h1>

    {{-- links --}}
    <div class="flex mt-8 md:mt-0">
        {{-- make links blue when active route --}}
        <a href="/" class="border-b-2 border-transparent text-xs font-bold uppercase mx-7 py-2 {{ request()->is('/') ? 'text-blue-700' : '' }}">Home Page</a>
        
        {{-- if authenticated --}}
        @if (auth()->check())
            <a href="/offers-requests" class="border-b-2 border-transparent text-xs font-bold uppercase mx-7 py-2 {{ request()->is('offers-requests') ? 'text-blue-700' : '' }}">My Offers & Requests</a>
            
            <div class="relative " id="user-menu">
                <a href="#" class=" border-b-2 border-transparent text-xs font-bold uppercase mx-7 py-2 {{ request()->is('account') ? 'text-blue-700' : '' }}">
                    {{auth()->user()->name}}
                    <i class="fas fa-chevron-down"></i> <!-- Dropdown arrow -->
                </a>
                <div class="absolute left-0 mt-2 w-48 rounded-md shadow-lg  bg-white ring-1 ring-black ring-opacity-5 hidden" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button">
                    <a href="#" class="border-b-2 border-transparent block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Admin</a>
                    <a href="#" class="border-b-2 border-transparent block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Profile</a>
                    <a href="/logout" class="border-b-2 border-transparent block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">Logout</a>
                </div>
            </div>
            
        @endif


        {{-- if guest (not authenticated) --}}
        @if (!auth()->check())
            <a href="/register" class=" border-b-2 border-transparent text-xs font-bold uppercase mx-7 py-2 {{ request()->is('register') ? 'text-blue-700' : '' }}">Register</a>
            <a href="/login" class="border-b-2 border-transparent bg-blue-700 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
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
            link.classList.replace('border-transparent', 'border-blue-700');
        });
        link.addEventListener('mouseout', () => {
            link.classList.replace('border-blue-700', 'border-transparent');
        });
    });


    //toggle the user menu
    document.getElementById('user-menu').addEventListener('click', function() {
        var dropdown = this.querySelector('[role="menu"]');
        dropdown.classList.toggle('hidden');
    });
</script>