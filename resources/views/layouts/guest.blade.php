<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @include('layouts.seo')

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Prism Code Highlighting -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.17.1/themes/prism-okaidia.min.css" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.17.1/plugins/line-numbers/prism-line-numbers.min.css" rel="stylesheet" />

        <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.17.1/components/prism-core.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.17.1/plugins/autoloader/prism-autoloader.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.17.1/plugins/line-numbers/prism-line-numbers.min.js"></script>
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>
    </body>
</html>
