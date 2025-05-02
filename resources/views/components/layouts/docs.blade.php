<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" xmlns:livewire="http://www.w3.org/1999/html">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        {{-- add dynamic head elements --}}
        @if (isset($head))
            {{ $head }}
        @else
            <title>{{ config('app.name') }}</title>
        @endif
        <meta name="author" content="Mohammad Samgan Khan" />
        <meta property="og:url" content="{{ url()->current() }}" />
        <meta name="og:type" content="website" />
        <meta name="og:site_name" content="msamgan.com" />

        @if (isset($canonical))
            {{ $canonical }}
        @else
            <link rel="canonical" href="{{ url()->current() }}" />
        @endif

        <script
            defer
            src="https://cloud.umami.is/script.js"
            data-website-id="5feea10c-6999-43d0-983f-f963a4631506"
            data-domains="msamgan.com"
        ></script>

        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/apple-touch-icon.png') }}" />
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/favicon-32x32.png') }}" />
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/favicon-16x16.png') }}" />
        <link rel="manifest" href="{{ url('/site.webmanifest') }}" />
        <link rel="mask-icon" href="{{ url('/safari-pinned-tab.svg') }}" color="#5bbad5" />
        <meta name="msapplication-TileColor" content="#da532c" />
        <meta name="theme-color" content="#ffffff" />

        <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="dark:bg-gray-800">
        <div class="mt-8">
            <livewire:topmenu />
        </div>
        <div class="mx-auto flex max-w-screen-2xl content-center justify-between bg-white dark:bg-gray-800">
            {{ $slot }}
        </div>
        <livewire:mobilemenu />
        <x-footer />
    </body>
</html>
