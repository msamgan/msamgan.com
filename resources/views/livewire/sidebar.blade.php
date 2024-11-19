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
        <a
            href="{{ url($page["link"]) }}"
            wire:navigate
            class="@if (request()->is($page["link"]))
                text-red-700
            @endif block px-4 py-2 text-black text-opacity-80 hover:text-opacity-100"
        >
            <span class="flex flex-row justify-start gap-2">
                @if (request()->is($page["link"]))
                    <x-selected-icon />
                @endif

                <span>{{ $page["name"] }}</span>
            </span>
        </a>
    @endforeach
</div>
