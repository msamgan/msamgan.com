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
    <!-- Enhanced profile image with subtle border and animation -->
    <div class="relative inline-block">
        <div class="absolute -inset-0.5 bg-gradient-to-r from-red-600 to-red-400 rounded-full opacity-75 blur-sm"></div>
        <img
            src="{{ $data['intro']['img'] }}"
            class="relative h-36 w-36 rounded-full border-2 border-white dark:border-gray-700 object-cover transition-all duration-300 hover:scale-105"
            alt="{{ $data['name'] }}"
        />
    </div>

    <!-- Name and username -->
    <h1 class="mt-6">
        {{ $data['name'] }} <span class="text-red-600 dark:text-red-400 font-normal">({{ $data['username'] }})</span>
    </h1>

    <!-- Title -->
    <p class="text-gray-600 dark:text-gray-300">{{ $data['title'] }}</p>

    <!-- Text paragraphs -->
    @foreach ($data['intro']['text'] as $text)
        <p class="text-gray-700 dark:text-gray-200 hover:text-gray-900 dark:hover:text-white transition-colors duration-300">
            {{ $text }}
        </p>
    @endforeach

    <!-- Sponsor button -->
    <div class="mt-6 flex justify-end">
        <iframe
            src="https://github.com/sponsors/msamgan/button"
            title="Sponsor msamgan"
            height="32"
            width="114"
            style="border: 0; border-radius: 6px"
            class="hover-lift transition-transform duration-300"
        ></iframe>
    </div>
</div>
