@props(['selections'])


<div class="flex items-center flex-wrap whitespace-wrap mb-3 -ml-1">

    {{-- clear filters button --}}
    <a href="/" class="flex items-center">
        <x-button-alternative>
            Clear filters
        </x-button-alternative>
    </a>
  

    @foreach ($selections as $filterName => $filterValue)
        @if ($filterValue ?? false)

            <x-badge-indigo>
                {{ ucwords(str_replace('_', ' ', $filterName)) }}: {{ ucwords(str_replace('_', ' ', $filterValue)) }}
            </x-badge-indigo>
        @endif
        
    @endforeach

</div>