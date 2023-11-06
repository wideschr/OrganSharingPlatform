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
    <div class="flex flex-col justify-center items-align  pt-20 pb-5 text-center bg-gray-50">
        <x-page-title>
            Message about one of your offers
            <x-slot name="introText">
                Someone just sent you a message about one of your offers. Exciting!<br>
                Below you can find the message and the email address of the sender. If you want, you can reply to this
                email to contact the sender.
                If you want to see the offer, you can click on the button below.
            </x-slot>
        </x-page-title>
        <div class="w-full flex justify-center bg-gray-50 pb-20">
            <x-button-default>
                Go to the offer
                <x-slot name='href'>{{url('/offer/' . $offer->id)}}</x-slot>
            </x-button-default>
        </div>
        
    </div>




    <section class="flex flex-col overflow-auto lg:w-4/5 mx-auto grid mt-10">

        {{-- description and details block --}}
        <div class="grid grid-cols-12">

            
            <div class="col-span-6">
                {{-- message --}}
                <div class="flex flex-col items-start justify-start ">
                    <h2 class="mb-4 text-left text-lg font-normal text-gray-500 lg:text-xl  dark:text-gray-400">
                        Message that was sent</h2>
                    <p class="mb-4 text-left leading-relaxed ">From: <a href="mailto:{{ $requestFormData['email'] }}" class="underline text-blue-700">{{ $requestFormData['email'] }}</a></p>
                    <p class="mb-4 text-left leading-relaxed whitespace-normal">{{ $requestFormData['message'] }}</p>
                </div>

                {{-- description --}}
                <div class="flex flex-col items-start justify-start ">
                    <h2 class="mb-4 text-left text-lg font-normal text-gray-500 lg:text-xl  dark:text-gray-400">
                        Description of your offer</h2>
                    <p class="mb-4 text-left leading-relaxed">{{ $offer->description }}</p>
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
