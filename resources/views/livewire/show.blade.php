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
        <meta name="description" content="{{ $post['excerpt'] }}"/>
        <meta name="keywords" content="{{ $tagList }}"/>

        <meta property="og:title" content="{{ titleGenerator(Str::title($post['title'])) }}"/>
        <meta property="og:description" content="{{ $post['excerpt'] }}"/>
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
        <meta name="twitter:image" content="{{ $post['featured_image'] ?? 'https://msamgan.dev/storage/images/MNn9limQxw66kpBfxjnXQ4jvdndLXom3bh7oeMvc.png' }}" />

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
            <div class="relative overflow-hidden rounded-lg shadow-sm mb-6">
                <img
                    src="{{ $post['featured_image'] }}"
                    alt="{{ $post['title'] }}"
                    class="max-h-96 w-full object-cover"
                />
                <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
            </div>
        @endif

        <h1 class="text-2xl sm:text-3xl font-medium text-gray-900 dark:text-white">
            {{ Str::title($post['title']) }}
        </h1>

        <div class="flex w-full flex-col items-start justify-between space-y-4 mb-6 md:flex-row md:items-center md:space-y-0">
            <div class="flex items-center space-x-3">
                <img
                    src="https://secure.gravatar.com/avatar/c2acbea3e046c1b8cf7358d8526eda63?s=80"
                    alt="msamgan"
                    class="h-10 w-10 rounded-full border border-gray-200 dark:border-gray-700 object-cover"
                />
                <div>
                    <span class="block text-sm font-medium text-gray-900 dark:text-white">msamgan</span>
                    <span class="block text-xs text-gray-500 dark:text-gray-400">{{ dateFormat($post['published_at']) }}</span>
                </div>
            </div>

            {{--<div class="flex space-x-2">
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
            </div>--}}
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6">
            <div
                class="post-content prose prose-lg max-w-none dark:prose-invert prose-headings:font-medium prose-a:text-gray-700 hover:prose-a:text-gray-900 dark:prose-a:text-gray-300 dark:hover:prose-a:text-white">
                {!! $post['content'] !!}
            </div>
        </div>

        @if ($post['tags'])
            <div class="mt-6 flex flex-wrap gap-2">
                @foreach ($post['tags'] as $tag)
                    <a
                        wire:navigate
                        href="{{ route('tags.show', $tag['slug']) }}"
                        class="text-xs px-2 py-1 rounded-full bg-gray-100 text-gray-600 hover:bg-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 transition-colors duration-200"
                    >
                        #{{ $tag['name'] }}
                    </a>
                @endforeach
            </div>
        @endif

        {{-- <x-fx-banner /> --}}

        <!-- Related Posts Section -->
        <div class="mt-8 bg-gray-50 dark:bg-gray-800/50 rounded-lg p-6 shadow-sm">
            <h4 class="flex items-center mb-4 text-lg font-medium text-gray-900 dark:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-500 dark:text-gray-400" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
                Related posts
            </h4>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach ($post['related_posts'] as $related)
                    <div class="border-b border-gray-100 dark:border-gray-700 pb-4">
                        <h5 class="font-medium text-gray-900 dark:text-white mb-1">
                            <a
                                href="{{ route('posts.show', $related['slug']) }}"
                                class="hover:text-gray-600 dark:hover:text-gray-300 transition-colors duration-200"
                            >
                                {{ $related['title'] }}
                            </a>
                        </h5>

                        @if (isset($related['published_at']))
                            <div class="flex items-center space-x-2 text-xs text-gray-500 dark:text-gray-400 mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <span>{{ isset($related['published_at']) ? dateFormat($related['published_at']) : '' }}</span>
                            </div>
                        @endif

                        @if (isset($related['excerpt']) && !empty($related['excerpt']))
                            <p class="text-sm text-gray-600 dark:text-gray-300 line-clamp-2 mb-2">
                                {{ $related['excerpt'] }}
                            </p>
                        @endif

                        @if (isset($related['tags']) && !empty($related['tags']))
                            <div class="flex flex-wrap gap-1 mt-2">
                                @foreach ($related['tags'] as $tag)
                                    <a
                                        href="{{ route('tags.show', $tag['slug']) }}"
                                        class="text-xs px-2 py-1 rounded-full bg-gray-100 text-gray-600 hover:bg-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 transition-colors duration-200"
                                    >
                                        #{{ $tag['name'] }}
                                    </a>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Sponsor Section -->
        <div class="mt-8 bg-gray-50 dark:bg-gray-800 rounded-lg p-6 shadow-sm border border-gray-100 dark:border-gray-700">
            <div class="flex items-center mb-4">
                <div class="p-2 bg-gray-100 dark:bg-gray-700 rounded-lg mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700 dark:text-gray-300"
                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-medium text-gray-900 dark:text-white">Support My Work</h3>
            </div>

            <div class="ml-14">
                <p class="text-sm text-gray-600 dark:text-gray-300">
                    If you find my content helpful and want to see more quality articles, tools, and resources,
                    consider supporting my work through GitHub Sponsors. Your support helps me dedicate more time
                    to creating free, open-source content.
                </p>

                <a href="https://github.com/sponsors/msamgan" target="_blank" rel="noopener"
                   class="inline-flex items-center mt-3 text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white font-medium transition-colors duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                    Become a sponsor
                </a>
            </div>
        </div>

        <!-- Comments Section -->
        <div class="mt-8 bg-white dark:bg-gray-800 rounded-lg p-6 shadow-sm">
            <h4 class="flex items-center mb-4 text-lg font-medium text-gray-900 dark:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-500 dark:text-gray-400" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
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
                <p class="text-center text-gray-500 dark:text-gray-400 mt-4">
                    Please enable JavaScript to view the
                    <a href="https://disqus.com/?ref_noscript" class="text-gray-700 dark:text-gray-300 hover:underline">comments
                        powered by Disqus.</a>
                </p>
            </noscript>
        </div>
    </article>
</div>
