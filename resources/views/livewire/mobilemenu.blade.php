<?php

use JetBrains\PhpStorm\NoReturn;
use Livewire\Volt\Component;

new class extends Component
{
    public bool $isOpen = false;

    #[NoReturn]
    public function toggleMenu(): void
    {
        $this->isOpen = ! $this->isOpen;
    }
}; ?>

<div>
    <div class="relative right-5 md:hidden" wire:click="toggleMenu">
        <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="size-6"
        >
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5"
            />
        </svg>
    </div>

    <div
        x-data="{ show: @entangle('isOpen') }"
        x-show="show"
        x-transition:enter="transition duration-300 ease-out"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition duration-200 ease-in"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="relative z-10 md:hidden"
        aria-labelledby="slide-over-title"
        role="dialog"
        aria-modal="true"
        style="display: none"
    >
        <div class="fixed inset-0 bg-gray-500/75 transition-opacity" aria-hidden="true"></div>
        <div class="fixed inset-0 overflow-hidden">
            <div class="absolute inset-0 overflow-hidden">
                <div
                    class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-52"
                    x-transition:enter="transform transition duration-500 ease-in-out"
                    x-transition:enter-start="translate-x-full"
                    x-transition:enter-end="translate-x-0"
                    x-transition:leave="transform transition duration-500 ease-in-out"
                    x-transition:leave-start="translate-x-0"
                    x-transition:leave-end="translate-x-full"
                >
                    <div class="pointer-events-auto relative w-screen max-w-md">
                        <div class="absolute left-0 top-0 -ml-8 flex pr-2 pt-4 sm:-ml-10 sm:pr-4">
                            <button
                                type="button"
                                wire:click="toggleMenu"
                                class="relative rounded-full p-2 text-gray-300 transition-colors duration-200 hover:bg-red-600 hover:text-white focus:outline-none focus:ring-2 focus:ring-red-500"
                            >
                                <span class="absolute -inset-2.5"></span>
                                <span class="sr-only">Close panel</span>
                                <svg
                                    class="size-6"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    aria-hidden="true"
                                    data-slot="icon"
                                >
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>

                        <div class="flex h-full flex-col overflow-y-scroll bg-white py-6 shadow-xl dark:bg-gray-800">
                            <div class="relative mt-6 flex-1 px-4 sm:px-6">
                                <livewire:sidebar />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
