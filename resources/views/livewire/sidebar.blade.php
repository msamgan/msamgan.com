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
                text-red-700
            @endif block px-4 py-2 text-black text-opacity-80 hover:text-opacity-100"
        >
            <span class="flex flex-row justify-start gap-2">
                @if (request()->is($page["link"]))
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" style="width: 15px">
                        <path
                            fill-rule="evenodd"
                            d="M13.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 0 1-1.06-1.06L11.69 12 4.72 5.03a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                            clip-rule="evenodd"
                        />
                        <path
                            fill-rule="evenodd"
                            d="M19.28 11.47a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 1 1-1.06-1.06L17.69 12l-6.97-6.97a.75.75 0 0 1 1.06-1.06l7.5 7.5Z"
                            clip-rule="evenodd"
                        />
                    </svg>
                @endif

                <span>{{ $page["name"] }}</span>
            </span>
        </a>
    @endforeach
</div>
