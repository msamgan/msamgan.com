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

<div>
    <div class="grid grid-cols-1 space-y-6 gap-4 md:grid-cols-1">
        @foreach ($data['tools'] as $tool)
            <a rel="noopener noreferrer" href="{{ $tool['link'] }}" target="_blank">
                <div class="rounded-md bg-gray-50 p-2 text-gray-800">
                    <div class="flex items-center gap-4">
                        <img
                            src="{{ $tool['img'] }}"
                            alt="{{ $tool['name'] }}"
                            class="block h-16 w-16 rounded-md object-cover object-center"
                        />
                        <div>
                            <h3 class="text-lg text-gray-900">{{ $tool['name'] }}</h3>
                            <p class="font-light leading-7 text-gray-700">
                                {{ $tool['description'] }}
                            </p>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>
