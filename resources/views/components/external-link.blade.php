<div>
    <a
        href="{{ $link }}"
        target="_blank"
        rel="noopener noreferrer"
        class="group relative mb-1 block overflow-hidden rounded-lg px-4 py-2.5 text-gray-700 transition-all duration-300 hover:text-red-600 dark:text-gray-300 dark:hover:text-red-400"
    >
        <!-- Background hover effect -->
        <span class="absolute inset-0 z-0 bg-gradient-to-r from-red-50 to-red-100 dark:from-gray-800 dark:to-gray-700 opacity-0 transition-opacity duration-300 group-hover:opacity-100"></span>

        <!-- Left border indicator -->
        <span class="absolute left-0 top-0 h-full w-0.5 bg-red-600 dark:bg-red-500 opacity-0 transition-opacity duration-300 group-hover:opacity-100"></span>

        <span class="relative z-10 flex items-center justify-between">
            <span class="transform transition-transform duration-300 group-hover:translate-x-1">{{ $label }}</span>

            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-3.5 w-3.5 transform transition-transform duration-300 group-hover:translate-x-0.5"
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
        </span>
    </a>
</div>
