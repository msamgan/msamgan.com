<title>{{ titleGenerator('Contact') }}</title>
<meta
    name="description"
    content="Contact me for any queries, collaborations, or just to say hi. I am always open to new opportunities and meeting new people."
/>
<meta
    name="keywords"
    content="contact, contact me, collaborations, queries, opportunities, Full Stack Development, get in touch, feedback"
/>

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website" />
<meta property="og:url" content="{{ url()->current() }}" />
<meta property="og:title" content="{{ titleGenerator('Contact') }}" />
<meta
    property="og:description"
    content="Contact me for any queries, collaborations, or just to say hi. I am always open to new opportunities and meeting new people."
/>
<meta property="og:image" content="https://msamgan.dev/storage/images/MNn9limQxw66kpBfxjnXQ4jvdndLXom3bh7oeMvc.png" />
<meta property="og:site_name" content="msamgan.com" />

<!-- Twitter Card -->
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:url" content="{{ url()->current() }}" />
<meta name="twitter:title" content="{{ titleGenerator('Contact') }}" />
<meta
    name="twitter:description"
    content="Contact me for any queries, collaborations, or just to say hi. I am always open to new opportunities and meeting new people."
/>
<meta name="twitter:image" content="https://msamgan.dev/storage/images/MNn9limQxw66kpBfxjnXQ4jvdndLXom3bh7oeMvc.png" />

<!-- Structured Data / JSON-LD -->
<script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "ContactPage",
        "name": "Contact",
        "description": "Contact me for any queries, collaborations, or just to say hi. I am always open to new opportunities and meeting new people.",
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
