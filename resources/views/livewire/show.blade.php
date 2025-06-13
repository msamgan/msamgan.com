<?php

use App\Service;
use App\Shortener;
use Illuminate\Support\Facades\Cache;
use JetBrains\PhpStorm\NoReturn;
use Livewire\Volt\Component;

new class extends Component
{
    public array $post;

    public string $tagList = '';

    public string $currentUrl = '';

    public string $metaDescription = '';

    public function mount(): void
    {
        $post = Service::getPost(request()->route('post'));

        abort_if(isset($post['status']) && $post['status'] === false, 404);

        $this->post = $post;

        $tagArray = [];
        foreach ($this->post['tags'] as $tag) {
            $tagArray[] = $tag['name'];
        }

        $this->tagList = implode(', ', $tagArray);
        $this->currentUrl = url()->current();
        $this->metaDescription = $this->post['excerpt'];
    }

    #[NoReturn]
    public function copyShortUrl(): void
    {
        $cacheKey = 'short-url-' . $this->currentUrl;
        $cacheDuration = 3600 * 24; // 24 hours
        $shortUrl = Cache::remember(
            $cacheKey,
            $cacheDuration,
            fn (): string => Shortener::shorten(url: $this->currentUrl),
        );

        $this->dispatch('copy-short-url', url: $this->currentUrl, short_url: $shortUrl);
    }

    #[NoReturn]
    public function copyMetaDescription(): void
    {
        $this->dispatch('copy-meta-description', description: $this->metaDescription);
    }
}; ?>

<div>
    <x-slot name="head">
        <title>{{ titleGenerator(Str::title($post['title'])) }}</title>
        <meta name="description" content="{{ $post['excerpt'] }}" />
        <meta name="keywords" content="{{ $tagList }}" />

        <meta property="og:title" content="{{ titleGenerator(Str::title($post['title'])) }}" />
        <meta property="og:description" content="{{ $post['excerpt'] }}" />
        <meta property="og:type" content="article" />
        <meta property="og:url" content="{{ $currentUrl }}" />
        <meta
            property="og:image"
            content="{{ $post['featured_image'] ?? 'https://msamgan.dev/storage/images/MNn9limQxw66kpBfxjnXQ4jvdndLXom3bh7oeMvc.png' }}"
        />

        <!-- Twitter Card -->
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:url" content="{{ $currentUrl }}" />
        <meta name="twitter:title" content="{{ titleGenerator(Str::title($post['title'])) }}" />
        <meta name="twitter:description" content="{{ $post['excerpt'] }}" />
        <meta
            name="twitter:image"
            content="{{ $post['featured_image'] ?? 'https://msamgan.dev/storage/images/MNn9limQxw66kpBfxjnXQ4jvdndLXom3bh7oeMvc.png' }}"
        />

        <!-- Structured Data / JSON-LD -->
        <script type="application/ld+json">
            {
                "@context": "https://schema.org",
                "@type": "BlogPosting",
                "headline": "{{ Str::title($post['title']) }}",
                "description": "{{ $post['excerpt'] }}",
                "image": "{{ $post['featured_image'] ?? 'https://msamgan.dev/storage/images/MNn9limQxw66kpBfxjnXQ4jvdndLXom3bh7oeMvc.png' }}",
                "datePublished": "{{ $post['published_at'] }}",
                "dateModified": "{{ $post['updated_at'] ?? $post['published_at'] }}",
                "url": "{{ $currentUrl }}",
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
                    "@id": "{{ $currentUrl }}"
                },
                "keywords": "{{ $tagList }}"
            }
        </script>

        <link rel="canonical" href="{{ $currentUrl }}" />
    </x-slot>

    <article class="post space-y-6">
        @if ($post['featured_image'])
            <div class="relative mb-6 overflow-hidden rounded-lg shadow-sm">
                <img
                    src="{{ $post['featured_image'] }}"
                    alt="{{ $post['title'] }}"
                    class="max-h-96 w-full object-cover"
                />
                <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
            </div>
        @endif

        <h1 class="text-4xl font-bold text-gray-900 dark:text-white">
            {{ Str::title($post['title']) }}
        </h1>

        <div
            class="mb-6 flex w-full flex-col items-start justify-between space-y-4 md:flex-row md:items-center md:space-y-0"
        >
            <div class="flex items-center space-x-3">
                <img
                    src="https://secure.gravatar.com/avatar/c2acbea3e046c1b8cf7358d8526eda63?s=80"
                    alt="msamgan"
                    class="h-10 w-10 rounded-full border border-gray-200 object-cover dark:border-gray-700"
                />
                <div>
                    <span class="block text-base font-medium text-gray-900 dark:text-white">msamgan</span>
                    <span class="block text-sm text-gray-500 dark:text-gray-400">
                        {{ dateFormat($post['published_at']) }}
                    </span>
                </div>
            </div>

            {{--
                <div class="flex space-x-2">
                <button
                wire:click="copyShortUrl"
                class="btn btn-outline text-xs py-1 px-3 flex items-center space-x-1"
                title="Copy short URL"
                >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                </svg>
                <span>Share</span>
                </button>
                </div>
            --}}
        </div>

        <div class="rounded-lg bg-white shadow-sm dark:bg-gray-800">
            <div
                class="post-content prose prose-base dark:prose-invert prose-headings:font-medium prose-h2:text-3xl prose-h3:text-2xl prose-h4:text-xl prose-a:text-gray-700 hover:prose-a:text-gray-900 dark:prose-a:text-gray-300 dark:hover:prose-a:text-white max-w-none"
            >
                {!! $post['content'] !!}
            </div>
        </div>

        @if ($post['tags'])
            <div class="mt-6 flex flex-wrap gap-2">
                @foreach ($post['tags'] as $tag)
                    <a
                        wire:navigate
                        href="{{ route('tags.show', $tag['slug']) }}"
                        class="rounded-full bg-gray-100 px-2 py-1 text-sm text-gray-600 transition-colors duration-200 hover:bg-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700"
                    >
                        #{{ $tag['name'] }}
                    </a>
                @endforeach
            </div>
        @endif

        {{-- <x-fx-banner /> --}}

        <!-- Related Posts Section -->
        <div class="mt-8">
            <h4 class="mb-4 flex items-center text-xl font-medium text-gray-900 dark:text-white">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="mr-2 h-5 w-5 text-gray-500 dark:text-gray-400"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
                Related posts
            </h4>
            @foreach ($post['related_posts'] as $related)
                <x-post-list-related :post="$related" />
            @endforeach
        </div>

        <!-- Sponsor Section -->
        <div
            class="mt-8 rounded-lg border border-gray-100 bg-gray-50 p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800"
        >
            <div class="mb-4 flex items-center">
                <div class="mr-4 rounded-lg bg-gray-100 p-2 dark:bg-gray-700">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5 text-gray-700 dark:text-gray-300"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"
                        />
                    </svg>
                </div>
                <h3 class="text-2xl font-medium text-gray-900 dark:text-white">Support My Work</h3>
            </div>

            <div class="ml-14">
                <p class="text-base text-gray-600 dark:text-gray-300">
                    If you find my content helpful and want to see more quality articles, tools, and resources, consider
                    supporting my work through GitHub Sponsors. Your support helps me dedicate more time to creating
                    free, open-source content.
                </p>

                <a
                    href="https://github.com/sponsors/msamgan"
                    target="_blank"
                    rel="noopener"
                    class="mt-3 inline-flex items-center text-base font-medium text-gray-700 transition-colors duration-200 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="mr-1 h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M13 7l5 5m0 0l-5 5m5-5H6"
                        />
                    </svg>
                    Become a sponsor
                </a>
            </div>
        </div>

        <!-- Comments Section -->
        <div class="mt-8 rounded-lg bg-white p-6 shadow-sm dark:bg-gray-800">
            <h4 class="mb-4 flex items-center text-xl font-medium text-gray-900 dark:text-white">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="mr-2 h-5 w-5 text-gray-500 dark:text-gray-400"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"
                    />
                </svg>
                Discussion
            </h4>
            <div id="disqus_thread"></div>
            <script>
                (function () {
                    // DON'T EDIT BELOW THIS LINE
                    var d = document,
                        s = d.createElement('script');
                    s.src = 'https://msamgan-com.disqus.com/embed.js';
                    s.setAttribute('data-timestamp', +new Date());
                    (d.head || d.body).appendChild(s);
                })();
            </script>
            <noscript>
                <p class="mt-4 text-center text-base text-gray-500 dark:text-gray-400">
                    Please enable JavaScript to view the
                    <a href="https://disqus.com/?ref_noscript" class="text-gray-700 hover:underline dark:text-gray-300">
                        comments powered by Disqus.
                    </a>
                </p>
            </noscript>
        </div>
    </article>
</div>
