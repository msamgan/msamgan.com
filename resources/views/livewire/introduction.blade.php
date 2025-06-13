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
        <div class="absolute -inset-0.5 rounded-full bg-gradient-to-r from-red-600 to-red-400 opacity-75 blur-sm"></div>
        <img
            src="{{ $data['intro']['img'] }}"
            class="relative h-36 w-36 rounded-full border-2 border-white object-cover transition-all duration-300 hover:scale-105 dark:border-gray-700"
            alt="{{ $data['name'] }}"
        />
    </div>

    <!-- Name and username -->
    <h1 class="mt-6 text-4xl font-bold">
        {{ $data['name'] }}
        <span class="text-2xl font-normal text-red-500 dark:text-red-400">({{ $data['username'] }})</span>
    </h1>

    <!-- Title -->
    <p class="mt-2 text-xl text-gray-600 dark:text-gray-300">{{ $data['title'] }}</p>

    <!-- Text paragraphs -->
    @foreach ($data['intro']['text'] as $text)
        <p
            class="mt-4 text-base text-gray-700 transition-colors duration-300 hover:text-gray-900 dark:text-gray-200 dark:hover:text-white"
        >
            {{ $text }}
        </p>
    @endforeach

    <!-- Sponsor button -->
    <!-- Sponsor Section -->
    <div class="mt-8 rounded-lg border border-gray-100 bg-gray-50 p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
        <div class="mb-4 flex items-center">
            <div class="mr-4 rounded-lg bg-gray-100 p-2 dark:bg-gray-700">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5 text-gray-700 dark:text-gray-300"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"
                    />
                </svg>
            </div>
            <h3 class="text-2xl font-medium text-gray-900 dark:text-white">Support My Work</h3>
        </div>

        <div class="ml-14">
            <p class="text-base text-gray-600 dark:text-gray-300">
                If you find my content helpful and want to see more quality articles, tools, and resources, consider
                supporting my work through GitHub Sponsors. Your support helps me dedicate more time to creating free,
                open-source content.
            </p>

            <a
                href="https://github.com/sponsors/msamgan"
                target="_blank"
                rel="noopener"
                class="mt-3 inline-flex items-center text-base font-medium text-gray-700 transition-colors duration-200 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="mr-1 h-5 w-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M13 7l5 5m0 0l-5 5m5-5H6"
                    />
                </svg>
                Become a sponsor
            </a>
        </div>
    </div>
</div>
