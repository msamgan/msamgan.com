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
    <img src="{{ $data['intro']['img'] }}" class="h-32 w-32 rounded-full" alt="{{ $data['name'] }}" />
    <h1 class="col-span-2 mb-4 mt-4 text-3xl font-bold text-gray-900 dark:text-white">
        {{ $data['name'] }} ({{ $data['username'] }})
    </h1>
    <p class="text-sm text-gray-500 dark:text-white">{{ $data['title'] }}</p>
    @foreach ($data['intro']['text'] as $text)
        <div class="mt-4 text-lg font-light leading-7 text-gray-700 dark:text-white">
            {{ $text }}
        </div>
    @endforeach
</div>
