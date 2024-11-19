<?php

use Livewire\Volt\Component;

new class extends Component
{
    public array $data = [];

    public function mount(): void
    {
        $this->data = getStaticData();
    }
}; ?>

<div class="">
    @foreach ($data["navigation"]["pages"] as $page)
        @if ($page["external"])
            <a
                href="{{ url($page["link"]) }}"
                target="_blank"
                rel="noopener noreferrer"
                class="block px-4 py-2 text-black text-opacity-80 hover:text-opacity-100"
            >
                {{ $page["name"] }}
            </a>
        @else
            <a
                href="{{ url($page["link"]) }}"
                wire:navigate
                class="@if (request()->is($page["link"]))
                    text-red-700
                @else
                    text-black
                @endif block px-4 py-2 text-opacity-80 hover:text-opacity-100"
            >
                <span class="flex flex-row justify-start gap-1">
                    @if (request()->is($page["link"]))
                        <x-selected-icon />
                    @endif

                    <span>{{ $page["name"] }}</span>
                </span>
            </a>
        @endif
    @endforeach
</div>
