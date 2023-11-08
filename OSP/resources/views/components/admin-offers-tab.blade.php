@props(['offers'])


<div class="relative sm:rounded-lg">

    <table class="w-full text-sm text-left shadow-md text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3 text-center">
                    Actions
                </th>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    User_id
                </th>
                <th scope="col" class="px-6 py-3">
                    User Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Type
                </th>
                <th scope="col" class="px-6 py-3">
                    Species_id
                </th>
                <th scope="col" class="px-6 py-3">
                    Species
                </th>
                <th scope="col" class="px-6 py-3">
                    Strain
                </th>
                <th scope="col" class="px-6 py-3">
                    Genetics
                </th>
                <th scope="col" class="px-6 py-3">
                    Sex
                </th>
                <th scope="col" class="px-6 py-3">
                    Date of Birth
                </th>
                <th scope="col" class="px-6 py-3">
                    Vital Status
                </th>
                <th scope="col" class="px-6 py-3">
                    Expiration Date
                </th>
                <th scope="col" class="px-6 py-3">
                    Organisation
                </th>
                <th scope="col" class="px-6 py-3">
                    Location
                </th>
                <th scope="col" class="px-6 py-3">
                    Removed organs
                </th>
                <th scope="col" class="px-6 py-3">
                    Amount
                </th>
                <th scope="col" class="px-6 py-3">
                    Description
                </th>
                <th scope="col" class="px-6 py-3">
                    Published at
                </th>

            </tr>
        </thead>
        <tbody>

            @foreach ($offers as $offer)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                    <td class="flex items-center px-6 py-4 space-x-3">
                        <x-button-alternative>
                            <a href="/admin/{{ $offer->id }}/edit">
                                <img src="/images/icon_edit_black.png" alt="" style="max-width:1rem">
                            </a>
                        </x-button-alternative>

                        <x-button-red>
                            <x-slot name='href'>"/admin/{{ $offer->id }}/delete"</x-slot>
                            <img src="/images/icon_delete_white.png" alt="" style="max-width:1rem">
                        </x-button-red>
                    </td>

                    <td class="px-6 py-4 text-blue-700 underline">
                        <a href="/offer/{{ $offer->id }}">
                            {{ $offer->id }}
                        </a>
                    </td>
                    <td class="px-6 py-4">
                        {{ $offer->user->id }}
                    </td>
                    <td class="px-6 py-4 text-blue-700 underline">
                        <a href="/profile/{{ $offer->user->username }}">
                            {{ $offer->user->name }}
                        </a>
                    </td>
                    <td class="px-6 py-4">
                        {{ $offer->type }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $offer->species_id }}
                    </td>
                    <td class="px-6 py-4 ">
                        {{ $offer->species->name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $offer->strain }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $offer->genetics }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $offer->sex }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $offer->dob }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $offer->vital_status }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $offer->expiration_date }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $offer->organisation }}
                    </td>
                    <td class="px-6 py-4">
                        {{ Str::limit($offer->location, 20) }}
                    </td>
                    <td class="px-6 py-4">
                        {{ Str::limit($offer->removed_organs, 20) }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $offer->amount }}
                    </td>
                    <td class="px-6 py-4">
                        {{ Str::limit($offer->description, 20) }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $offer->published_at }}
                    </td>

                </tr>
            @endforeach

        </tbody>
    </table>
</div>
