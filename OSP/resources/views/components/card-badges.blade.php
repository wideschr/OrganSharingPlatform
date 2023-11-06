@props(['offer'])

<div class="flex items-center ml-8">

    @if (\Carbon\Carbon::parse($offer->expiration_date)->greaterThanOrEqualTo(now()))
        <x-badge-green>
            Valid until {{ $offer->expiration_date }} - {{ \Carbon\Carbon::parse($offer->expiration_date)->diffForHumans() }}
            
        </x-badge-green>
    @else
        <x-badge-red>
            Expired {{ \Carbon\Carbon::parse($offer->expiration_date)->diffForHumans() }}
        </x-badge-red>
    @endif

</div>
