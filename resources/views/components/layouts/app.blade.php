<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" xmlns:livewire="http://www.w3.org/1999/html">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        {{-- add dynamic head elements --}}
        @if (isset($head))
            {{ $head }}
        @else
            <title>{{ config('app.name') }} - Web Developer, Laravel Expert & Open Source Contributor</title>
            <meta name="description" content="Personal website of Mohammad Samgan Khan, a web developer specializing in Laravel, PHP, JavaScript, and more. Sharing tutorials, tips, and insights on web development." />
        @endif
        <meta name="author" content="Mohammad Samgan Khan" />
        <meta name="keywords" content="web development, laravel, php, javascript, nodejs, programming, tutorials, coding" />

        <!-- Open Graph / Facebook -->
        <meta property="og:url" content="{{ url()->current() }}" />
        <meta property="og:type" content="website" />
        <meta property="og:site_name" content="msamgan.com" />
        <meta property="og:title" content="{{ isset($head) ? '' : config('app.name') . ' - Web Developer, Laravel Expert & Open Source Contributor' }}" />
        <meta property="og:description" content="{{ isset($head) ? '' : 'Personal website of Mohammad Samgan Khan, a web developer specializing in Laravel, PHP, JavaScript, and more. Sharing tutorials, tips, and insights on web development.' }}" />
        <meta property="og:image" content="{{ asset('/msamgan.jpeg') }}" />

        <!-- Twitter -->
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:url" content="{{ url()->current() }}" />
        <meta name="twitter:title" content="{{ isset($head) ? '' : config('app.name') . ' - Web Developer, Laravel Expert & Open Source Contributor' }}" />
        <meta name="twitter:description" content="{{ isset($head) ? '' : 'Personal website of Mohammad Samgan Khan, a web developer specializing in Laravel, PHP, JavaScript, and more. Sharing tutorials, tips, and insights on web development.' }}" />
        <meta name="twitter:image" content="{{ asset('/msamgan.jpeg') }}" />

        <!-- Structured Data / JSON-LD -->
        <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Person",
            "name": "Mohammad Samgan Khan",
            "url": "{{ url('/') }}",
            "image": "{{ asset('/msamgan.jpeg') }}",
            "sameAs": [
                "https://github.com/msamgan",
                "https://www.linkedin.com/in/mohd-samgan-khan/"
            ],
            "jobTitle": "Web Developer",
            "worksFor": {
                "@type": "Organization",
                "name": "msamgan.com"
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

        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Instrument+Sans:ital,wght@0,400..700;1,400..700&display=swap"
            rel="stylesheet"
        />

        <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="min-h-screen transition-colors duration-300">
        <!-- Back to top button -->
        <button id="back-to-top" class="fixed bottom-8 right-8 z-50 hidden p-2 rounded-full bg-red-600 text-white shadow-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 transition-all duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
            </svg>
        </button>

        <div class="min-h-screen py-8 px-4 sm:px-6 lg:px-8">
            <div
                class="mx-auto max-w-7xl rounded-2xl bg-white p-4 shadow-[0_8px_30px_rgb(0,0,0,0.04)] dark:bg-gray-800 dark:shadow-[0_8px_30px_rgb(0,0,0,0.1)] transition-all duration-300 sm:p-6 md:p-8 lg:p-10"
            >
                <div class="flex flex-col md:flex-row md:justify-between md:gap-8">
                    <div class="hidden md:block md:w-1.5/12 md:flex-shrink-0">
                        <div class="sticky top-8">
                            <livewire:sidebar />
                        </div>
                    </div>

                    <main class="w-full md:w-8/12 px-0 sm:px-2 md:px-4 order-2 md:order-1">
                        <div class="animate-fadeIn">
                            {{ $slot }}
                        </div>
                    </main>

                    <div class="hidden md:block md:w-2/12 md:flex-shrink-0 order-3">
                        <div class="sticky top-8">
                            <x-affiliates />
                        </div>
                    </div>

                    <div class="md:hidden order-1 md:order-3 mb-4">
                        <livewire:mobilemenu />
                    </div>
                </div>
            </div>
        </div>

        <x-footer />

        <script>
            // Back to top button functionality
            const backToTopButton = document.getElementById('back-to-top');

            window.addEventListener('scroll', () => {
                if (window.pageYOffset > 300) {
                    backToTopButton.classList.remove('hidden');
                    backToTopButton.classList.add('flex');
                } else {
                    backToTopButton.classList.remove('flex');
                    backToTopButton.classList.add('hidden');
                }
            });

            backToTopButton.addEventListener('click', () => {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        </script>
    </body>
</html>
