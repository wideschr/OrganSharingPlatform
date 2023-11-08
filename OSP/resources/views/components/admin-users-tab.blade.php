
<div class="relative overflow-x-auto sm:rounded-lg">

    <div class="flex justify-end px-6 pb-6 mt-2">
        <x-create-user-modal/>
    </div>

    <table class="w-full text-sm text-left  shadow-md text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    is_admin
                </th>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Username
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Profile Picture
                </th>
                <th scope="col" class="px-6 py-3">
                    Biography
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>

            @foreach ($users as $user)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                <td class="px-6 py-4">
                    {{$user->id}}
                </td>
                <td class="px-6 py-4">
                    @if ($user->is_admin)
                        Yes
                    @else
                        No
                    @endif
                </td>
                <td class="px-6 py-4">
                    {{$user->name}}
                </td>
                <td class="px-6 py-4">
                    <a href="/profile/" class="text-blue-700 underline">
                        {{$user->username}}
                    </a>
                </td>
                <td class="px-6 py-4">
                    {{$user->email}}
                </td>
                <td class="px-6 py-4 ">
                    <img class=" w-6 h-6 rounded-full mx-auto"
                        src="{{ asset('storage/'.$user->profile_picture_url) }}"
                        alt="{{$user->username}}. picture">
                </td>
                <td class="px-6 py-4">
                    {{$user->biography}}
                </td>
                <td class="flex items-center px-6 py-4 space-x-3">
                    <x-button-alternative>
                        <a href="/admin/{{ $user->id}}/edit">
                            <img src="/images/icon_edit_black.png" alt="" style="max-width:1rem">
                        </a>
                    </x-button-alternative>

                    <x-button-red>
                        <x-slot name='href'>"/admin/{{ $user->id }}/delete"</x-slot>
                        <img src="/images/icon_delete_black.png" alt="" style="max-width:1rem">
                    </x-button-red>
                </td>
            </tr>
            @endforeach
            
        </tbody>
    </table>
</div>
