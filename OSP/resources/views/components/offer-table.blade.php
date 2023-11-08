@props(['offer'])

<?php
    $offerDetails= array(
        'type' => $offer->type,
        'species' => $offer->species->name,
        'strain' => $offer->strain,
        'genetics' => $offer->genetics, 
        'sex' => $offer->sex, 
        'date of birth' => $offer->dob,
        'vital_status' => $offer->vital_status,
        'removed organs'=> $offer->removed_organs , 
        'amount' => $offer->amount, 
        'euthanasia_method' => $offer->euthanasia_method->name,
        'expiration date' => $offer->expiration_date, 
        'organisation'=> $offer->organisation, 
        'location'  => $offer->location,
        'published on'  => $offer->published_at, 
        'published by'  => $offer->user->username,
    )
?>  

{{-- caption --}}
<h2 class="mb-8 text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400 whitespace-nowrap">Details</h2>

{{-- table --}}
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full  text-left text-gray-500 dark:text-gray-400">
        
        {{-- content --}}
        <tbody>
            @foreach ($offerDetails as $detailName => $value)
                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-blue-700 whitespace-nowrap dark:text-white">
                        {{ ucwords(str_replace('_', ' ', $detailName)) }}
                    </th>
                    <td class="px-6 py-4 text-gray-700 whitespace-wrap dark:text-white">
                        {{ucwords($value)}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>