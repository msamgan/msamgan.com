<?php

use App\Service;
use Livewire\Volt\Component;

new class extends Component
{
    public string $tag = '';

    public array $tagPosts = [];

    public function mount(): void
    {
        $this->tag = request()->route('tag');
        $posts = Service::getTagPosts($this->tag);

        if (isset($posts['status']) && $posts['status'] === false) {
            abort(404);
        }

        $this->tagPosts = $posts;
    }
}; ?>

<div>
    <x-slot name="head">
        <title>{{ titleGenerator('Posts tagged with #' . $tag) }}</title>
        <meta
            name="description"
            content="Explore msamgan's technical blog featuring insightful programming posts, in-depth code tutorials, and the latest updates in the tech world. based on a tag"
        />
        <meta name="keywords" content="msamgan, blog, technical blog, programming, code, posts, {{ $tag }}" />
        <meta property="og:title" content="{{ titleGenerator('Posts tagged with #' . $tag) }}" />
        <meta
            property="og:description"
            content="Explore msamgan's technical blog featuring insightful programming posts, in-depth code tutorials, and the latest updates in the tech world. based on a tag"
        />
        <meta property="og:image" content="{{ getDefaultImageUrl() }}" />
    </x-slot>

    <h1 class="pb-4 text-xl font-semibold text-gray-900 dark:text-white">
        Posts tagged with #{{ $tag }} ({{ count($tagPosts) }})
    </h1>
    @foreach ($tagPosts as $post)
        <x-post-list :post="$post" />
    @endforeach
</div>
