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
    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
        @foreach ($data['services'] as $service)
            <div class="rounded-md bg-gray-50 shadow-md">
                <img
                    src="{{ $service['img'] }}"
                    alt="{{ $service['name'] }}"
                    class="block w-full rounded-md object-cover object-center h-64"
                />
                <div class="space-y-3 p-4">
                    <a rel="noopener noreferrer" href="#" class="block">
                        <h3 class="text-semibold text-xl text-gray-900">{{ $service['name'] }}</h3>
                    </a>
                    <p class="font-light leading-7 text-gray-700">{{ $service['description'] }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>
