<a
    href="{{ $link }}"
    wire:navigate
    class="@if ($active) text-red-600 font-medium @else text-gray-700 @endif mb-1 block rounded-lg px-4 py-2 transition-all duration-200 hover:bg-red-50 hover:pl-5 hover:text-red-600 dark:text-gray-200 dark:hover:bg-gray-700 dark:hover:text-red-400"
>
    <span class="flex flex-row items-center gap-2">
        @if ($active)
            <x-selected-icon />
        @endif

        <span>{{ $page['name'] }}</span>
    </span>
</a>
