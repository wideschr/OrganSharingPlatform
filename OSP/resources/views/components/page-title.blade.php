{{-- title block --}}
<div class="flex flex-col">
    <h1 class=" text-3xl uppercase text-white md:text-3xl lg:text-3xl dark:text-white pb-3">{{ $slot }}</h1>

    {{--   subtitle  --}}
    <p class="pb-10 text-lg  w-4/5 text-gray-200 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-400 mx-auto">
        {{ $introText }}</p>
</div>
