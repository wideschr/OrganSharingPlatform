<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Organ Sharing Platform</title>

    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>


</head>

<body class="flex flex-col font-sans min-h-screen">

    {{-- header --}}
    <x-page-header />


    <section class="border flex-grow">

        <?php

        if (isset($content)) {
            echo $content;
        }
        
        if (isset($register)) {
            echo $register;
        }

        if (isset($login)) {
            echo $login;
        }
        
        ?>

    </section>

    {{-- flash success/error message if there is one--}}
    <x-alert-success />
    <x-alert-error />

    {{-- subscribe to newsletter --}}
    <x-subscribe-footer />

    {{-- footer --}}
    <x-page-footer>

    </x-page-footer>
</body>

</html>
