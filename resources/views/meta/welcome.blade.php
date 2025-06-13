<title>{{ titleGenerator('Welcome to ' . config('app.name') . '.com') }}</title>
<meta
    name="description"
    content="Welcome to msamgan.com, the official website of Mohammad Samgan Khan. Explore my portfolio, blog, and various projects showcasing my work, skills, and expertise. Stay updated with the latest content and insights!"
/>
<meta name="keywords" content="mohammad samgan khan, msamgan, msamgan.com, personal website, portfolio, blog" />

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website" />
<meta property="og:url" content="{{ url()->current() }}" />
<meta property="og:title" content="Welcome to {{ config('app.name') }} | Home" />
<meta
    property="og:description"
    content="Welcome to msamgan.com. This is the personal website of Mohammad Samgan Khan. Here you will find my portfolio, blog, and other information."
/>
<meta property="og:image" content="https://msamgan.dev/storage/images/MNn9limQxw66kpBfxjnXQ4jvdndLXom3bh7oeMvc.png" />
<meta property="og:site_name" content="msamgan.com" />

<!-- Twitter Card -->
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:url" content="{{ url()->current() }}" />
<meta name="twitter:title" content="Welcome to {{ config('app.name') }} | Home" />
<meta
    name="twitter:description"
    content="Welcome to msamgan.com. This is the personal website of Mohammad Samgan Khan. Here you will find my portfolio, blog, and other information."
/>
<meta name="twitter:image" content="https://msamgan.dev/storage/images/MNn9limQxw66kpBfxjnXQ4jvdndLXom3bh7oeMvc.png" />

<!-- Structured Data / JSON-LD -->
<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebSite",
        "name": "{{ config('app.name') }}.com",
        "url": "{{ url('/') }}",
        "description": "Welcome to msamgan.com, the official website of Mohammad Samgan Khan. Explore my portfolio, blog, and various projects showcasing my work, skills, and expertise.",
        "author": {
            "@type": "Person",
            "name": "Mohammad Samgan Khan",
            "url": "{{ url('/') }}"
        },
        "publisher": {
            "@type": "Person",
            "name": "Mohammad Samgan Khan",
            "image": "{{ asset('/msamgan.jpeg') }}"
        },
        "potentialAction": {
            "@type": "SearchAction",
            "target": "{{ url('/') }}?search={search_term_string}",
            "query-input": "required name=search_term_string"
        }
    }
</script>

<link rel="canonical" href="{{ url()->current() }}" />
