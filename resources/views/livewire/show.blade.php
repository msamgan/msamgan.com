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

        if (isset($post['status']) && $post['status'] === false) {
            abort(404);
        }

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
        $shortUrl = Cache::remember($cacheKey, $cacheDuration, fn () => Shortener::shorten(url: $this->currentUrl));

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
        <meta
            property="og:image"
            content="{{ $post['featured_image'] ?? 'https://msamgan.dev/storage/images/MNn9limQxw66kpBfxjnXQ4jvdndLXom3bh7oeMvc.png' }}"
        />
    </x-slot>

    <article class="post space-y-8 text-gray-900">
        @if ($post['featured_image'])
            <img src="{{ $post['featured_image'] }}" alt="{{ $post['title'] }}" class="max-h-96 w-full" />
        @endif

        <h1 class="text-4xl leading-10 text-gray-700 dark:text-white md:text-4xl md:leading-10 md:tracking-tight">
            {{ Str::title($post['title']) }}
        </h1>

        <div
            class="flex w-full flex-col items-center justify-between space-y-4 text-gray-600 md:flex-row md:items-center md:space-y-0"
        >
            <div class="flex items-center md:space-x-2">
                <img
                    src="https://secure.gravatar.com/avatar/c2acbea3e046c1b8cf7358d8526eda63?s=80"
                    alt="msamgan"
                    class="h-4 w-4 rounded-full border border-gray-300 bg-gray-500"
                />
                <span class="ml-2 text-sm dark:text-white">msamgan • {{ dateFormat($post['published_at']) }}</span>
            </div>
        </div>

        <div class="font-light leading-7 text-gray-800 dark:text-white">
            <div class="post-content">
                {!! $post['content'] !!}
            </div>
        </div>

        @if ($post['tags'])
            <div class="mt-4 flex flex-wrap">
                @foreach ($post['tags'] as $tag)
                    <a
                        wire:navigate
                        href="{{ route('tags.show', $tag['slug']) }}"
                        class="mr-3 cursor-pointer rounded-sm text-gray-500 hover:underline"
                    >
                        #{{ $tag['name'] }}
                    </a>
                @endforeach
            </div>
        @endif

        <x-fx-banner />

        <h4 class="text-lg font-light">Related posts</h4>
        <ul class="ml-4 list-disc space-y-1 font-light">
            @foreach ($post['related_posts'] as $related)
                <li>
                    <a href="{{ route('posts.show', $related['slug']) }}" class="cursor-pointer hover:underline">
                        {{ $related['title'] }}
                    </a>
                </li>
            @endforeach
        </ul>

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
            Please enable JavaScript to view the
            <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a>
        </noscript>
    </article>
</div>
