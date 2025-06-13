<a
    href="{{ $link }}"
    wire:navigate
    class="block px-3 py-2 text-sm rounded-md transition-colors duration-200 @if ($active) bg-gray-100 text-gray-900 font-medium dark:bg-gray-800 dark:text-white @else text-gray-600 hover:text-gray-900 hover:bg-gray-50 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-800 @endif"
>
    <div class="flex items-center">
        @if ($active)
            <span class="w-1 h-4 bg-gray-900 dark:bg-gray-300 rounded-full mr-2"></span>
        @endif
        {{ $label }}
    </div>
</a>
