<div class="flex flex-row justify-between py-2">
    <h3
        class="w-3/4 flex-row text-lg font-light text-gray-700 hover:text-red-600 dark:text-white dark:hover:text-red-600"
        title="{{ $post['title'] }}"
    >
        <a href="{{ route('posts.show', $post['slug']) }}">
            {{ Str::title(substr($post['title'], 0, 120)) }}
            @if (strlen($post['title']) > 120)
                ...
            @endif
        </a>
    </h3>
    <small class="flex gap-3 text-sm text-gray-200 dark:text-white">
        @foreach ($post['tags'] as $key => $tag)
            <a href="{{ route('tags.show', $tag['slug']) }}" class="text-gray-500 dark:text-white" wire:navigate>
                <span class="text-gray-500 hover:text-red-600 dark:text-white">#{{ $tag['name'] }}</span>
            </a>
        @endforeach
    </small>
</div>
