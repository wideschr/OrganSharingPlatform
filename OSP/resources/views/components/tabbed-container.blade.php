
<div class="mb-4 border-b border-gray-200 dark:border-gray-700">
    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
        {{-- <li class="mr-2" role="presentation">
            <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="false">Dashboard</button>
        </li>         --}}
        <li class="mr-2" role="presentation">
            <button class="inline-block p-4 border-b-2 rounded-t-lg" id="users-tab" data-tabs-target="#users" type="button" role="tab" aria-controls="users" aria-selected="false">Users</button>
        </li>
        <li class="mr-2" role="presentation">
            <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="offers-tab" data-tabs-target="#offers" type="button" role="tab" aria-controls="offers" aria-selected="false">Offers</button>
        </li>
        <li role="presentation">
            <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="Faq-tab" data-tabs-target="#Faq" type="button" role="tab" aria-controls="Faq" aria-selected="false">FAQ</button>
        </li>
    </ul>
</div>
<div id="default-tab-content">
    {{-- <div class="hidden p-4 rounded-lg" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
        <x-admin-dashboard-tab/>
    </div>     --}}
    <div class="hidden p-4 rounded-lg " id="users" role="tabpanel" aria-labelledby="users-tab">
        <x-admin-users-tab :users="$users" />
    </div>
    <div class="hidden p-4 rounded-lg " id="offers" role="tabpanel" aria-labelledby="offers-tab">
        <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Settings tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
    </div>
    <div class="hidden p-4 rounded-lg " id="Faq" role="tabpanel" aria-labelledby="Faq-tab">
        <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Contacts tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
    </div>
</div>
