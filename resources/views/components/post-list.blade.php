<div class="card group mb-2 overflow-hidden border-l-4 border-transparent hover:border-l-red-500 transition-all duration-300 dark:bg-gray-800/50">
    <div class="card-bod px-4 py-2">
        <div class="flex flex-col justify-between space-y-1 md:flex-row md:items-center md:space-y-0">
            <div class="flex-1">
                <h3
                    class="text-lg font-medium leading-tight transition-colors duration-300 hover:text-red-600 dark:hover:text-red-400"
                    title="{{ $post['title'] }}"
                >
                    <a href="{{ route('posts.show', $post['slug']) }}" wire:navigate class="decoration-red-500 decoration-2 underline-offset-2">
                        {{ Str::title(substr($post['title'], 0, 120)) }}
                        @if (strlen($post['title']) > 120)
                            ...
                        @endif
                    </a>
                </h3>

                <div class="flex items-center space-x-2 text-xs text-gray-500 dark:text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>{{ dateFormat($post['published_at']) }}</span>
                </div>
            </div>
            <div class="flex flex-wrap gap-1">
                @foreach ($post['tags'] as $key => $tag)
                    <a
                        href="{{ route('tags.show', $tag['slug']) }}"
                        class="badge badge-secondary text-xs py-0.5 px-1.5 hover-lift transition-all duration-300 hover:bg-red-100 hover:text-red-800 dark:hover:bg-red-900 dark:hover:text-red-200"
                        wire:navigate
                    >
                        #{{ $tag['name'] }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
