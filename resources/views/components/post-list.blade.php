<div class="group mb-4 border-b border-gray-100 pb-4 dark:border-gray-800">
    <div class="flex flex-col justify-between space-y-2 md:flex-row md:items-start">
        <div class="flex-1">
            <h3 class="text-lg font-medium leading-tight text-gray-900 dark:text-white" title="{{ $post['title'] }}">
                <a
                    href="{{ route('posts.show', $post['slug']) }}"
                    wire:navigate
                    class="transition-colors duration-200 hover:text-gray-600 dark:hover:text-gray-300"
                >
                    {{ Str::title(substr($post['title'], 0, 120)) }}
                    @if (strlen($post['title']) > 120)
                        ...
                    @endif
                </a>
            </h3>

            <div class="mt-1 flex items-center space-x-2 text-sm text-gray-500 dark:text-gray-400">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-4 w-4"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
                    />
                </svg>
                <span>{{ dateFormat($post['published_at']) }}</span>
            </div>
        </div>
        <div class="mt-2 flex flex-wrap gap-1 md:mt-0">
            @if ($post['tags'] ?? null)
                @foreach ($post['tags'] as $key => $tag)
                    <a
                        href="{{ route('tags.show', $tag['slug']) }}"
                        class="rounded-full bg-gray-100 px-2 py-1 text-sm text-gray-600 transition-colors duration-200 hover:bg-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700"
                        wire:navigate
                    >
                        #{{ $tag['name'] }}
                    </a>
                @endforeach
            @endif
        </div>
    </div>
</div>
