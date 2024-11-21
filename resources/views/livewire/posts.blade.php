<?php

use App\Service;
use Livewire\Volt\Component;

new class extends Component
{
    public array $posts = [];

    public function mount(): void
    {
        $this->posts = Service::getPostsPaginated(page: request('page', 1), query: request('query', ''));
    }
}; ?>

<div>
    <h1 class="pb-1 text-xl font-semibold text-gray-900 dark:text-white">Recent Posts</h1>

    <form>
        <input type="hidden" name="page" value="{{ request('page', 1) }}" />
        <input
            type="text"
            class="mt-2 w-full rounded-md border border-gray-300 p-2 dark:border-gray-700"
            name="query"
            value="{{ request('query', '') }}"
            placeholder="Search posts..."
        />
        <small class="text-gray-500 dark:text-white">Search for posts by title</small>
    </form>

    <div class="mt-1">
        @foreach ($posts['data'] as $post)
            <x-post-list :post="$post" />
        @endforeach
    </div>
</div>
