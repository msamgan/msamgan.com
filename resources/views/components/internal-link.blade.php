<a
    href="{{ $link }}"
    wire:navigate
    class="@if ($active) bg-gray-100 text-gray-900 font-medium dark:bg-gray-800 dark:text-white @else text-gray-600 hover:text-gray-900 hover:bg-gray-50 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-800 @endif block rounded-md px-3 py-2 text-sm transition-colors duration-200"
>
    <div class="flex items-center">
        @if ($active)
            <span class="mr-2 h-4 w-1 rounded-full bg-gray-900 dark:bg-gray-300"></span>
        @endif

        {{ $label }}
    </div>
</a>
