<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" xmlns:livewire="http://www.w3.org/1999/html">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        {{-- add dynamic head elements --}}
        @if (isset($head))
            {{ $head }}
        @else
            <title>{{ config('app.name') }} - Documentation & Tutorials</title>
            <meta name="description" content="Documentation, tutorials, and guides by Mohammad Samgan Khan. Learn about web development, Laravel, PHP, JavaScript, and more." />
        @endif
        <meta name="author" content="Mohammad Samgan Khan" />
        <meta name="keywords" content="documentation, tutorials, web development, laravel, php, javascript, nodejs, programming, coding" />

        <!-- Open Graph / Facebook -->
        <meta property="og:url" content="{{ url()->current() }}" />
        <meta property="og:type" content="website" />
        <meta property="og:site_name" content="msamgan.com" />
        <meta property="og:title" content="{{ isset($head) ? '' : config('app.name') . ' - Documentation & Tutorials' }}" />
        <meta property="og:description" content="{{ isset($head) ? '' : 'Documentation, tutorials, and guides by Mohammad Samgan Khan. Learn about web development, Laravel, PHP, JavaScript, and more.' }}" />
        <meta property="og:image" content="{{ asset('/msamgan.jpeg') }}" />

        <!-- Twitter -->
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:url" content="{{ url()->current() }}" />
        <meta name="twitter:title" content="{{ isset($head) ? '' : config('app.name') . ' - Documentation & Tutorials' }}" />
        <meta name="twitter:description" content="{{ isset($head) ? '' : 'Documentation, tutorials, and guides by Mohammad Samgan Khan. Learn about web development, Laravel, PHP, JavaScript, and more.' }}" />
        <meta name="twitter:image" content="{{ asset('/msamgan.jpeg') }}" />

        <!-- Structured Data / JSON-LD -->
        <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "TechArticle",
            "headline": "{{ isset($head) ? '' : config('app.name') . ' - Documentation & Tutorials' }}",
            "description": "{{ isset($head) ? '' : 'Documentation, tutorials, and guides by Mohammad Samgan Khan. Learn about web development, Laravel, PHP, JavaScript, and more.' }}",
            "image": "{{ asset('/msamgan.jpeg') }}",
            "author": {
                "@type": "Person",
                "name": "Mohammad Samgan Khan",
                "url": "{{ url('/') }}"
            },
            "publisher": {
                "@type": "Organization",
                "name": "msamgan.com",
                "logo": {
                    "@type": "ImageObject",
                    "url": "{{ asset('/msamgan.jpeg') }}"
                }
            },
            "mainEntityOfPage": {
                "@type": "WebPage",
                "@id": "{{ url()->current() }}"
            }
        }
        </script>

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
