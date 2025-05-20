<title>{{ titleGenerator('Services') }}</title>
<meta
    name="description"
    content="Explore msamgan's services and discover how we can help you grow your business. From web development to digital marketing, we offer a wide range of services to meet your needs."
/>
<meta
    name="keywords"
    content="services, web development, digital marketing, seo, content writing, social media marketing"
/>

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website" />
<meta property="og:url" content="{{ url()->current() }}" />
<meta property="og:title" content="{{ titleGenerator('Services') }}" />
<meta
    property="og:description"
    content="Explore msamgan's services and discover how we can help you grow your business. From web development to digital marketing, we offer a wide range of services to meet your needs."
/>
<meta property="og:image" content="https://msamgan.dev/storage/images/MNn9limQxw66kpBfxjnXQ4jvdndLXom3bh7oeMvc.png" />
<meta property="og:site_name" content="msamgan.com" />

<!-- Twitter Card -->
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:url" content="{{ url()->current() }}" />
<meta name="twitter:title" content="{{ titleGenerator('Services') }}" />
<meta name="twitter:description" content="Explore msamgan's services and discover how we can help you grow your business. From web development to digital marketing, we offer a wide range of services to meet your needs." />
<meta name="twitter:image" content="https://msamgan.dev/storage/images/MNn9limQxw66kpBfxjnXQ4jvdndLXom3bh7oeMvc.png" />

<!-- Structured Data / JSON-LD -->
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "ItemList",
    "name": "Services",
    "description": "Explore msamgan's services and discover how we can help you grow your business. From web development to digital marketing, we offer a wide range of services to meet your needs.",
    "url": "{{ url()->current() }}",
    "itemListElement": [
        {
            "@type": "Service",
            "name": "Web Development",
            "url": "{{ url()->current() }}#web-development",
            "provider": {
                "@type": "Person",
                "name": "Mohammad Samgan Khan",
                "url": "{{ url('/') }}"
            }
        },
        {
            "@type": "Service",
            "name": "Digital Marketing",
            "url": "{{ url()->current() }}#digital-marketing",
            "provider": {
                "@type": "Person",
                "name": "Mohammad Samgan Khan",
                "url": "{{ url('/') }}"
            }
        }
    ],
    "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "{{ url()->current() }}"
    }
}
</script>

<link rel="canonical" href="{{ url()->current() }}" />
