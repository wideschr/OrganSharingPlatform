{{-- title block --}}

    {{--   head title   --}}
    <h1 class=" text-3xl font-bold uppercase text-blue-700 md:text-3xl lg:text-3xl dark:text-white pb-3">{{$slot}}</h1>

    {{--   subtitle  --}}
    <p class="pb-2 text-lg font-normal w-4/5 text-gray-500 lg:text-xl sm:px-16 lg:px-48 dark:text-gray-400 mx-auto">{{$introText}}</p>

    @if(auth()->check())



@endif
</div>


        