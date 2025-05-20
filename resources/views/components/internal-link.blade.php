<a
    href="{{ $link }}"
    wire:navigate
    class="group relative mb-1 block overflow-hidden rounded-lg px-4 py-2.5 transition-all duration-300 @if ($active) bg-red-50 text-red-600 font-medium dark:bg-gray-800 dark:text-red-400 @else text-gray-700 hover:text-red-600 dark:text-gray-300 dark:hover:text-red-400 @endif"
>
    <!-- Background hover effect -->
    <span class="absolute inset-0 z-0 bg-gradient-to-r from-red-50 to-red-100 dark:from-gray-800 dark:to-gray-700 opacity-0 transition-opacity duration-300 group-hover:opacity-100"></span>

    <!-- Left border indicator -->
    <span class="absolute left-0 top-0 h-full w-0.5 bg-red-600 dark:bg-red-500 @if ($active) opacity-100 @else opacity-0 group-hover:opacity-100 @endif transition-opacity duration-300"></span>

    <span class="relative z-10 flex flex-row items-center gap-2">
        @if ($active)
            <x-selected-icon />
        @else
            <span class="h-4 w-0 transition-all duration-300 group-hover:w-4"></span>
        @endif

        <span class="transform transition-transform duration-300 group-hover:translate-x-1">{{ $page['name'] }}</span>
    </span>
</a>
