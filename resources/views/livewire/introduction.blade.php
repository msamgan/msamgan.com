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

    <!-- Improved typography for name and username -->
    <h1 class="col-span-2 mb-2 mt-4 text-3xl font-bold text-gray-900 dark:text-white tracking-tight">
        {{ $data['name'] }} <span class="text-red-600 dark:text-red-400 font-normal">({{ $data['username'] }})</span>
    </h1>

    <!-- Enhanced title with better visibility -->
    <p class="text-base text-gray-600 dark:text-gray-300 font-medium mb-4">{{ $data['title'] }}</p>

    <!-- Improved text paragraphs with better readability -->
    @foreach ($data['intro']['text'] as $text)
        <div class="mt-4 text-lg font-light leading-relaxed text-gray-700 dark:text-gray-200 hover:text-gray-900 dark:hover:text-white transition-colors duration-300">
            {{ $text }}
        </div>
    @endforeach

    <!-- Maintained the same positioning for the sponsor button -->
    <div class="float-end mr-12 mt-4">
        <iframe
            src="https://github.com/sponsors/msamgan/button"
            title="Sponsor msamgan"
            height="32"
            width="114"
            style="border: 0; border-radius: 6px"
        ></iframe>
    </div>
</div>
