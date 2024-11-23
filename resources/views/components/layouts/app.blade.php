<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" xmlns:livewire="http://www.w3.org/1999/html">
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
        <script>
            hljs.highlightAll({
                selector: 'pre code',
            });
        </script>
    </head>

    <body>
        <div class="mx-auto flex max-w-7xl justify-between bg-white p-12">
            <div class="hidden w-1/12 md:block">
                <livewire:sidebar />
            </div>

            <div class="w-full md:w-8/12">
                {{ $slot }}
            </div>

            <div class="hidden w-2/12 md:block">
                <x-affiliates />
            </div>

            <livewire:mobilemenu />
        </div>

        <x-footer />
    </body>
</html>
