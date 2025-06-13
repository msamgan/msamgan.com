<title>{{ titleGenerator('Tools') }}</title>
<meta
    name="description"
    content="A collection of tools to help you with your projects. Find everything you need to streamline your workflow and boost productivity."
/>
<meta
    name="keywords"
    content="tools, productivity, workflow, Full Stack Development, web development, machine learning, data science, digital marketing, seo, content writing, social media marketing"
/>

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website" />
<meta property="og:url" content="{{ url()->current() }}" />
<meta property="og:title" content="{{ titleGenerator('Tools') }}" />
<meta
    property="og:description"
    content="A collection of tools to help you with your projects. Find everything you need to streamline your workflow and boost productivity."
/>
<meta property="og:image" content="https://msamgan.dev/storage/images/MNn9limQxw66kpBfxjnXQ4jvdndLXom3bh7oeMvc.png" />
<meta property="og:site_name" content="msamgan.com" />

<!-- Twitter Card -->
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:url" content="{{ url()->current() }}" />
<meta name="twitter:title" content="{{ titleGenerator('Tools') }}" />
<meta
    name="twitter:description"
    content="A collection of tools to help you with your projects. Find everything you need to streamline your workflow and boost productivity."
/>
<meta name="twitter:image" content="https://msamgan.dev/storage/images/MNn9limQxw66kpBfxjnXQ4jvdndLXom3bh7oeMvc.png" />

<!-- Structured Data / JSON-LD -->
<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "CollectionPage",
        "headline": "Tools",
        "description": "A collection of tools to help you with your projects. Find everything you need to streamline your workflow and boost productivity.",
        "url": "{{ url()->current() }}",
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
        "mainEntityOfPage": {
            "@type": "WebPage",
            "@id": "{{ url()->current() }}"
        }
    }
</script>

<link rel="canonical" href="{{ url()->current() }}" />
