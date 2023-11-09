
    <!-- Modal toggle -->
<button data-modal-target="faq-modal" data-modal-toggle="faq-modal"
class=" px-5 py-2.5 mx-1  align-center text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
type="button">
+ Create FAQ
</button>

<!-- Main modal -->
<div id="faq-modal" tabindex="-1" aria-hidden="true"
class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
<div class="relative w-full max-w-2xl max-h-full">
    <!-- Modal content -->
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
        <button type="button"
            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
            data-modal-hide="faq-modal">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
            <span class="sr-only">Close modal</span>
        </button>
        <div class="px-6 py-6 ">
            <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Create a FAQ</h3>


            <form class="space-y-6" action="/admin/create-faq" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="flex">
                    {{-- left side --}}
                    <div class="flex flex-col pr-10 flex-grow space-y-4">

                        {{-- topic --}}
                        <div>
                            <label for="topic"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Topic</label>
                                <input type="text" name="topic" id="topic" class=" w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none py-2 px-4 mb-4 bg-gray-50 rounded-lg rounded-t-lg border border-gray-300 dark:bg-gray-800 dark:border-gray-700">

                            {{-- errors are saver in $errors. @error blade can be used to display them. $message is the error message and is linked to the key wih is the input field name --}}
                            @error('topic')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        {{-- question --}}
                        <div>
                            <label for="question"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Question</label>
                            
                                <textarea name="question" id="question" cols="30" rows="3"
                                class=" w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none py-2 px-4 mb-4 bg-gray-50 rounded-lg rounded-t-lg border border-gray-300 dark:bg-gray-800 dark:border-gray-700"
                                placeholder="Type the question here"
                                ></textarea>

                            {{-- errors are saver in $errors. @error blade can be used to display them. $message is the error message and is linked to the key wih is the input field name --}}
                            @error('question')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- answer --}}
                        <div>
                            <label for="answer"
                                class="block  mb-2 text-sm font-medium text-gray-900 dark:text-white">Answer</label>
                            <textarea name="answer" id="answer" cols="30" rows="10"
                                class=" w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none py-2 px-4 mb-4 bg-gray-50 rounded-lg rounded-t-lg border border-gray-300 dark:bg-gray-800 dark:border-gray-700"
                                placeholder="Write the answer here."
                                ></textarea>
                            {{-- errors are saver in $errors. @error blade can be used to display them. $message is the error message and is linked to the key wih is the input field name --}}
                            @error('answer')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        
                    </div>

                   
                </div>


                {{-- submit --}}
                <button type="submit"
                    class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Save & Publish</button>
                
            </form>
        </div>
    </div>
</div>
</div>
