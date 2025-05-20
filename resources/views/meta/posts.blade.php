<title>{{ titleGenerator('Published Posts') }}</title>

@php
    $page = request()->get('page');
    $description = 'Explore msamgan\'s technical blog featuring insightful programming posts, in-depth code tutorials, and the latest updates in the tech world. Join our community and elevate your coding skills!';

    if ($page) {
        $description = 'Explore ' . Number::spellOrdinal($page) . ' page of msamgan\'s technical blog featuring insightful programming posts, in-depth code tutorials, and the latest updates in the tech world. Join our community and elevate your coding skills!';
    }
@endphp

<meta name="description" content="{{ $description }}" />
<meta
    name="keywords"
    content="msamgan, blog, programming, tutorials, tech, coding, community, technical blog, code, posts"
/>

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website" />
<meta property="og:url" content="{{ url()->current() }}" />
<meta property="og:title" content="{{ titleGenerator('Published Posts') }}" />
<meta property="og:description" content="{{ $description }}" />
<meta property="og:image" content="https://msamgan.dev/storage/images/MNn9limQxw66kpBfxjnXQ4jvdndLXom3bh7oeMvc.png" />
<meta property="og:site_name" content="msamgan.com" />

<!-- Twitter Card -->
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:url" content="{{ url()->current() }}" />
<meta name="twitter:title" content="{{ titleGenerator('Published Posts') }}" />
<meta name="twitter:description" content="{{ $description }}" />
<meta name="twitter:image" content="https://msamgan.dev/storage/images/MNn9limQxw66kpBfxjnXQ4jvdndLXom3bh7oeMvc.png" />

<!-- Structured Data / JSON-LD -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "CollectionPage",
    "headline": "Published Posts",
    "description": "{{ $description }}",
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
