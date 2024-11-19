<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net" />
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="mx-auto flex min-h-screen max-w-7xl justify-between bg-white p-12">
            <div class="w-2/12">
                <livewire:sidebar />
            </div>
            <div class="w-8/12">
                {{ $slot }}
            </div>
            <div class="w-2/12"></div>
        </div>
    </body>
</html>
