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

<meta property="og:title" content="{{ titleGenerator('Published Posts') }}" />
<meta property="og:description" content="{{ $description }}" />
<meta property="og:image" content="https://msamgan.dev/storage/images/MNn9limQxw66kpBfxjnXQ4jvdndLXom3bh7oeMvc.png" />
