<div>
    <a
        href="{{ $link }}"
        target="_blank"
        rel="noopener noreferrer"
        class="flex items-center gap-1 px-4 py-2 mb-1 rounded-lg text-gray-700 transition-all duration-200 hover:bg-red-50 hover:text-red-600 hover:pl-5 dark:text-gray-200 dark:hover:bg-gray-700 dark:hover:text-red-400"
    >
        <span>{{ $label }}</span>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
        </svg>
    </a>
</div>
