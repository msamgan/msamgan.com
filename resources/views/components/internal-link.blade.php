<a
    href="{{ $link }}"
    wire:navigate
    class="@if ($active)
        text-red-700
    @else
        text-black
    @endif block px-4 py-2 text-opacity-80 hover:text-opacity-100"
>
    <span class="flex flex-row justify-start gap-1">
        @if ($active)
            <x-selected-icon />
        @endif

        <span>{{ $page["name"] }}</span>
    </span>
</a>
