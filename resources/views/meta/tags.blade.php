<title>{{ titleGenerator('Tags') }}</title>
<meta name="description" content="Tags list for msamgan.com blog" />
<meta name="keywords" content="msamgan, blog, technical blog, programming, code, tags" />

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website" />
<meta property="og:url" content="{{ url()->current() }}" />
<meta property="og:title" content="{{ titleGenerator('Tags') }}" />
<meta property="og:description" content="Tags list for msamgan.com blog" />
<meta property="og:image" content="{{ getDefaultImageUrl() }}" />
<meta property="og:site_name" content="msamgan.com" />

<!-- Twitter Card -->
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:url" content="{{ url()->current() }}" />
<meta name="twitter:title" content="{{ titleGenerator('Tags') }}" />
<meta name="twitter:description" content="Tags list for msamgan.com blog" />
<meta name="twitter:image" content="{{ getDefaultImageUrl() }}" />

<!-- Structured Data / JSON-LD -->
<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "CollectionPage",
        "headline": "Tags",
        "description": "Tags list for msamgan.com blog",
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
