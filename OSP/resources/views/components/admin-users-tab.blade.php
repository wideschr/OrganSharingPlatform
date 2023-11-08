   
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
   
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>

                <th scope="col" class="px-6 py-3">
                    id
                </th>
                <th scope="col" class="px-6 py-3">
                    Name
                </th>
                <th scope="col" class="px-6 py-3">
                    Role
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                    <td class="px-6 py-4">
                        {{ $user->id }}
                    </td>
                    <th scope="row"
                        class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                        <img class="w-10 h-10 rounded-full"
                            src="{{ asset('storage/' . $user->profile_picture_url) }}" alt="">
                        <div class="pl-3">
                            <a href="/profile/{{ $user->username }}" class="text-blue-700 underline">
                                <div class="text-base font-semibold">{{ $user->name }}</div>
                            </a>
                            <div class="font-normal text-gray-500">{{ $user->username }}</div>
                            <div class="font-normal text-gray-500">{{ $user->email }}</div>
                        </div>
                    </th>
                    <td class="px-6 py-4">
                        @if ($user->is_admin)
                            Admin
                        @else
                            User
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        <x-button-alternative>
                            <a href="/admin/{{ $user->id }}/edit">
                                <img src="/images/icon_edit_black.png" alt="" style="max-width:1rem">
                            </a>
                        </x-button-alternative>
                        <x-button-red>
                            <x-slot name='href'>"/admin/{{ $user->id }}/delete"</x-slot>
                            <img src="/images/icon_delete_white.png" alt="" style="max-width:1rem">
                        </x-button-red>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
