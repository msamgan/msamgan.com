<a
    href="{{ $link }}"
    target="_blank"
    rel="noopener noreferrer"
    class="block rounded-md px-3 py-2 text-sm text-gray-600 transition-colors duration-200 hover:bg-gray-50 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-800 dark:hover:text-white"
>
    <div class="flex items-center justify-between">
        <span>{{ $label }}</span>
        <svg
            xmlns="http://www.w3.org/2000/svg"
            class="ml-1.5 h-3.5 w-3.5 text-gray-400"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
        >
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"
            />
        </svg>
    </div>
</a>
