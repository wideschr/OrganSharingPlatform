@props(['faqs'])

<div class=" pb-2 ">
    <x-create-faq-modal />
</div>



<div class="relative sm:rounded-lg w-4/5 mr-auto">
    @foreach ($faqs as $faq)
        <div class="bg-gray-50 p-5 mt-2 mb-3 border border-gray-200 rounded-xl">
            <div class="flex justify-between items-center w-full pb-1">
                <p class="text-lg text-blue-700 font-bold dark:text-gray-400">{{ $faq->question }}</p>
                <div class="flex flex-grow justify-end">
                    
                    <x-edit-faq-modal :faq="$faq" />
                  

                    <a href="/admin/delete-faq/{{$faq->id}}"
                        class="inline-block focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mx-1 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                        <img src="/images/icon_delete_white.png" alt="" style="max-width:1rem">
                    </a>
                </div>

            </div>
            <div class="pb-2">
                <p class="text-sm text-gray-400 font-italic dark:text-gray-400 uppercase">{{ $faq->topic }}</p>
            </div>
            <div>
                <p>{{ $faq->answer }}</p>
            </div>

        </div>
    @endforeach


</div>
