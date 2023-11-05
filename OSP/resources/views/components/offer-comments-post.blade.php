@props(['comments', 'offer'])

{{-- scipt for toggle menu is at bottom --}}

<section class="bg-white dark:bg-gray-900 antialiased">
    <div class=" ">

        {{-- comments --}}

        @foreach ($comments as $comment)
            <article class="p-6 text-base bg-gray-50 rounded-xl dark:bg-gray-900 border-b border-gray-100 mb-4">
                <footer class="flex justify-between items-center mb-2">
                    <div class="flex items-center">
                        {{-- user --}}
                        <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold">
                            {{-- profile pic --}}
                            <img
                                class="mr-2 w-6 h-6 rounded-full"
                                src="{{ asset('storage/'.$comment->user->profile_picture_url) }}"
                                alt="Michael Gough">{{ $comment->user->username }}</p>
                        {{-- published at --}}
                        <p class="text-sm text-gray-600 dark:text-gray-400"><time > {{ \Carbon\Carbon::parse($comment->published_at)->diffForHumans() }}</time></p>
                    </div>

                    {{-- dropdown only viewable if admin --}}
                    @if (auth()->check() && auth()->user()->is_admin)
                        <div class="relative " id="comment-menu">
                            <button id="dropdownCommentButton{{$comment->id}}" data-dropdown-toggle="dropdownComment{{$comment->id}}"
                                class="relative inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 dark:text-gray-400 bg-gray-50 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                                type="button">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 16 3">
                                    <path
                                        d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                                </svg>
                                <span class="sr-only">Comment settings</span>
                            </button>
                            <!-- Dropdown menu -->
                            <div id="dropdownComment{{$comment->id}}"
                                class="absolute right-0 hidden z-10 w-36 bg-white rounded  divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600 "
                                role="menu" aria-orientation="vertical" aria-labelledby="comment-menu-button">
                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                    aria-labelledby="dropdownMenuIconHorizontalButton">
                                    {{-- <li>
                                        
                                        <a href="#"
                                            class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                            role="menuitem">Edit</a>
                                    </li> --}}
                                    <li>
                                        <form action="/offer/{{$offer->id}}/comments-delete/{{$comment->id}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-left w-full block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" 
                                            role="menuitem">Remove</button>
                                        </form>
                                        {{-- <a href="/offer/{{$offer->slug}}/comments-delete/{{$comment->id}}"
                                            class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                                            role="menuitem">Remove</a> --}}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endif

                </footer>

                {{-- body --}}
                <p class="text-gray-500 dark:text-gray-400">{{ $comment->body }}</p>

            </article>
        @endforeach



        {{-- submit comments --}}
        <form action="/offer/{{$offer->id}}/comments-post" method="POST" class="mb-6 flex flex-col items-right">
            @csrf

            <textarea id="body" rows="6"
                class=" w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-300 focus:border-blue-700 dark:bg-gray-800 dark:border-gray-700"
                placeholder="Write a comment and please remember to be nice..." 
                required
                name="body"></textarea>

            {{-- errors --}}
            @error('body')
                <p class="text-red-500 text-xs italic mb-4">{{ $message }}</p>
            @enderror

            <div>
               <button type="submit"
                class="inline-flex  items-center py-2.5 px-4 font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                Post comment
                </button> 
            </div>
            
        </form>
    </div>
</section>




@foreach ($comments as $comment)
    <script>
        document.getElementById('dropdownCommentButton{{ $comment->id }}').addEventListener('click', function() {
            var dropdown = document.getElementById('dropdownComment{{ $comment->id }}');
            dropdown.classList.toggle('hidden');
            console.log(dropdown)
        });
    </script>
@endforeach
