<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <title>Organ Sharing Platform | message about your offer</title>
</head>

<body>

    {{-- page title --}}
    <div class="flex flex-col justify-center items-align  pt-10 pb-5 text-center bg-gray-50">
        <x-page-title>
            Message about one of your offers
            <x-slot name="introText">
                Someone just sent you a message about one of your offers. Exciting!<br>
                Below you can find the message and the email address of the sender. If you want, you can reply to this
                email to contact the sender.
                If you want to see the offer, you can click on the button below.
            </x-slot>
        </x-page-title>
        
    </div>




    <section class="flex flex-col overflow-auto lg:w-4/5 mx-auto grid ">

        {{-- description and details block --}}
        <div class="grid grid-cols-12">

            <div class="col-span-6">
                {{-- description --}}
                <div class="flex flex-col items-start justify-start ">
                    <h2 class="mb-4 text-left text-lg font-normal text-gray-500 lg:text-xl  dark:text-gray-400">
                        Description</h2>
                    <p class="mb-4 text-left leading-relaxed">{{ $offer->description }}</p>


                    {{-- buttons --}}
                    <div class="flex mb-40 ">
                        <div class="flex "> {{-- This div is here because the default button is aligned at justify-end, which is not what we want. --}}
                            {{-- CTA --}}
                            <x-button-default>
                                <x-slot name='href'>"/offer/{{ $offer->id }}/request"</x-slot>
                                Contact the donor
                            </x-button-default>

                            {{-- bookmark button --}}
                            {{-- <button class="rounded-full w-10 h-10 bg-gray-200 p-0 border-0 inline-flex items-center justify-center text-gray-500 ml-4">
                                    <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                        <path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"></path>
                                    </svg>
                                </button> --}}
                        </div>
                    </div>
                </div>



            </div>

            <div class="col-span-1"></div>

            {{-- details table --}}
            <div class="col-span-5">
                <x-offer-table :offer="$offer" />
            </div>

        </div>



    </section>



</body>

</html>
