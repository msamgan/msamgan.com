<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net" />
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        {{-- add dynamic head elements --}}
        @if ($head)
            {{ $head }}
        @else
            <title>{{ config('app.name') }}</title>
        @endif
        <meta name="author" content="Mohammad Samgan Khan" />
        <meta property="og:url" content="{{ url()->current() }}" />
        <meta name="og:type" content="website" />
        <meta name="og:site_name" content="msamgan.com" />
    </head>
    <body>
        <div class="mx-auto flex max-w-7xl justify-between bg-white p-12">
            <div class="w-1/12">
                <livewire:sidebar />
            </div>
            <div class="w-8/12">
                {{ $slot }}
            </div>
            <div class="w-2/12">
                <x-affiliates />
            </div>
        </div>

        <x-footer />
    </body>
</html>
