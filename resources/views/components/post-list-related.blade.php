<div class="group mb-4 border-b border-gray-100 pb-4 dark:border-gray-800">
    <div class="flex flex-col justify-between space-y-2 md:flex-row md:items-start">
        <div class="flex-1">
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
    </div>
</div>
