@props(['faqs'])

@foreach ($faqs as $category => $faqGroup)
    <h2 class="mb-5 uppercase text-left text-lg font-normal text-blue-700 lg:text-xl  dark:text-gray-400">{{ $category }}</h2 >

    <div id="accordion-collapse" data-accordion="collapse"
        data-active-classes="bg-blue-100 dark:bg-gray-800 text-blue-700 dark:text-white"
        class="mb-10">

        @foreach ($faqGroup as $faq)
            <h3 id="accordion-collapse-heading-{{ $faq->id }}">
                <button type="button"
                    class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-blue-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800"
                    data-accordion-target="#accordion-collapse-body-{{ $faq->id }}" aria-expanded="false"
                    aria-controls="accordion-collapse-body-{{ $faq->id }}" x-data="{ open: false }"
                    @click="open = !open">
                    <span>{{ $faq->question }}</span>
                    <svg data-accordion-icon class="w-3 h-3 transform transition-transform duration-200"
                        :class="{ 'rotate-180': open }" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5 5 1 1 5" />
                    </svg>
                </button>
            </h3>

            <div id="accordion-collapse-body-{{ $faq->id }}" class="hidden"
                aria-labelledby="accordion-collapse-heading-{{ $faq->id }}">
                <div
                    class="p-5 border border-b-0 border-gray-200 focus:border-blue-700 dark:border-gray-700 dark:bg-gray-900">
                    <p class="mb-2 text-gray-500 dark:text-gray-400">{{ $faq->answer }}</p>
                </div>
            </div>
        @endforeach


    </div>
@endforeach
