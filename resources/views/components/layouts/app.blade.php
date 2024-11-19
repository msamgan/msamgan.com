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
                <div class="flex flex-col space-y-12">
                    <a
                        href="https://shop.ashallendesign.co.uk/?aff=WLoAY"
                        target="_blank"
                        rel="noopener noreferrer"
                        data-umami-event="click on laravel api"
                        class="hover:scale-105 hover:shadow-lg"
                    >
                        <img src="{{ asset('/laravel-api.png') }}" class="rounded-lg" alt="Laravel API" />
                    </a>
                    <a
                        href="https://shop.ashallendesign.co.uk/?aff=WLoAY"
                        target="_blank"
                        rel="noopener noreferrer"
                        data-umami-event="click on battle ready laravel"
                        class="hover:scale-105 hover:shadow-lg"
                    >
                        <img
                            src="{{ asset('/battle-ready-laravel.png') }}"
                            class="rounded-lg"
                            alt="Battle Ready Laravel"
                        />
                    </a>
                </div>
            </div>
        </div>

        <footer class="py-4 text-center text-gray-500 dark:text-white">
            <p>&copy; {{ date('Y') }} Mohammad Samgan Khan (msamgan). All rights reserved.</p>
        </footer>
    </body>
</html>
