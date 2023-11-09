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

    <title>Organ Sharing Platform | Reset Password</title>
</head>

<body>

    {{-- page title --}}
    <div class="flex flex-col justify-center items-align  pt-20 pb-5 text-center bg-gray-50">
        <x-page-title>
            Reset your password
            <x-slot name="introText">
                You requested to change your password. Please click the button below to reset your password.
                If this wasn't you, please ignore this email.
            </x-slot>
        </x-page-title>
        <div class="w-full flex justify-center bg-gray-50 pb-20">
            <x-button-default>
                Reset your password
                <x-slot name='href'>{{url('/password/reset/' . $email)}}</x-slot>
            </x-button-default>
        </div>
        
    </div>




    



</body>

</html>
