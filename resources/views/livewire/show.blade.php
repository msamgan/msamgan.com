<?php

use App\Service;
use Livewire\Volt\Component;

new class extends Component
{
    public array $post;

    public function mount(): void
    {
        $this->post = Service::getPost(request()->route('post'));
    }
}; ?>

<div>
    <article class="post space-y-8 text-gray-900">
        @if ($post['featured_image'])
            <img src="{{ $post['featured_image'] }}" alt="{{ $post['title'] }}" class="max-h-96 w-full" />
        @endif

        <h1 class="text-4xl leading-7 text-gray-700 md:text-4xl md:tracking-tight dark:text-white">
            {{ Str::title($post['title']) }}
        </h1>

        <div class="flex w-full flex-col items-start justify-between text-gray-600 md:flex-row md:items-center">
            <div class="flex items-center md:space-x-2">
                <img
                    src="https://secure.gravatar.com/avatar/c2acbea3e046c1b8cf7358d8526eda63?s=80"
                    alt=""
                    class="h-4 w-4 rounded-full border border-gray-300 bg-gray-500"
                />
                <span class="text-sm dark:text-white">msamgan • {{ dateFormat($post['published_at']) }}</span>
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
                        {{-- href="{{ route('tag', $tag) }}" --}}
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
    </article>
</div>
