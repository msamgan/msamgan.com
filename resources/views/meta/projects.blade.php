<title>{{ titleGenerator('Projects') }}</title>
<meta
    name="description"
    content="I have worked on a variety of projects, ranging from web development to machine learning. Here are some of the projects I have worked on."
/>
<meta
    name="keywords"
    content="projects, web development, machine learning, data science, digital marketing, seo, content writing, social media marketing,  Full Stack Development"
/>

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website" />
<meta property="og:url" content="{{ url()->current() }}" />
<meta property="og:title" content="{{ titleGenerator('Projects') }}" />
<meta
    property="og:description"
    content="I have worked on a variety of projects, ranging from web development to machine learning. Here are some of the projects I have worked on."
/>
<meta property="og:image" content="https://msamgan.dev/storage/images/MNn9limQxw66kpBfxjnXQ4jvdndLXom3bh7oeMvc.png" />
<meta property="og:site_name" content="msamgan.com" />

<!-- Twitter Card -->
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:url" content="{{ url()->current() }}" />
<meta name="twitter:title" content="{{ titleGenerator('Projects') }}" />
<meta
    name="twitter:description"
    content="I have worked on a variety of projects, ranging from web development to machine learning. Here are some of the projects I have worked on."
/>
<meta name="twitter:image" content="https://msamgan.dev/storage/images/MNn9limQxw66kpBfxjnXQ4jvdndLXom3bh7oeMvc.png" />

<!-- Structured Data / JSON-LD -->
<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "CollectionPage",
        "headline": "Projects",
        "description": "I have worked on a variety of projects, ranging from web development to machine learning. Here are some of the projects I have worked on.",
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
