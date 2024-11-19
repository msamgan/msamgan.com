<?php

use Livewire\Volt\Component;

new class extends Component
{
    public array $data = [];

    public function mount(): void
    {
        $this->data = json_decode(
            file_get_contents(storage_path('app/private/data.json')),
            true,
        );
    }
}; ?>

<div class="">
    @foreach ($this->data["navigation"]["pages"] as $page)
        <a
            href="{{ $page["link"] }}"
            wire:navigate
            class="@if (request()->is($page["link"]))
                ml-6
                text-red-700
            @endif block px-4 py-2 text-black text-opacity-80 hover:text-opacity-100"
        >
            {{ $page["name"] }}
        </a>
    @endforeach
</div>
