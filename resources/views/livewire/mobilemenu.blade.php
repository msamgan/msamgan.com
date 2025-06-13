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
    <!-- Hamburger menu button -->
    <button
        class="fixed right-4 top-4 z-50 flex h-9 w-9 items-center justify-center rounded-md bg-white shadow-sm transition-colors duration-200 hover:bg-gray-50 md:hidden dark:bg-gray-800 dark:hover:bg-gray-700"
        wire:click="toggleMenu"
        aria-label="Toggle menu"
    >
        <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="h-5 w-5 text-gray-700 dark:text-gray-300"
        >
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5"
            />
        </svg>
    </button>

    <!-- Mobile menu slide-over panel -->
    <div
        x-data="{ show: @entangle('isOpen') }"
        x-show="show"
        x-transition:enter="transition duration-300 ease-out"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition duration-200 ease-in"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="relative z-50 md:hidden"
        aria-labelledby="slide-over-title"
        role="dialog"
        aria-modal="true"
        style="display: none"
    >
        <!-- Backdrop -->
        <div class="fixed inset-0 bg-gray-900/50 transition-opacity" aria-hidden="true"></div>

        <div class="fixed inset-0 overflow-hidden">
            <div class="absolute inset-0 overflow-hidden">
                <div
                    class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10"
                    x-transition:enter="transform transition duration-300 ease-in-out"
                    x-transition:enter-start="translate-x-full"
                    x-transition:enter-end="translate-x-0"
                    x-transition:leave="transform transition duration-300 ease-in-out"
                    x-transition:leave-start="translate-x-0"
                    x-transition:leave-end="translate-x-full"
                >
                    <div class="pointer-events-auto relative w-screen max-w-md">
                        <!-- Close button -->
                        <div class="absolute left-0 top-0 -ml-12 flex pr-2 pt-4">
                            <button
                                type="button"
                                wire:click="toggleMenu"
                                class="flex h-9 w-9 items-center justify-center rounded-md bg-white shadow-sm transition-colors duration-200 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700"
                            >
                                <span class="sr-only">Close panel</span>
                                <svg
                                    class="h-5 w-5 text-gray-700 dark:text-gray-300"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    aria-hidden="true"
                                >
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>

                        <!-- Panel content -->
                        <div class="flex h-full flex-col overflow-y-auto bg-white shadow-sm dark:bg-gray-800">
                            <!-- Mobile header with logo -->
                            <div class="border-b border-gray-200 p-4 dark:border-gray-700">
                                <div class="flex items-center">
                                    <div class="h-8 w-8 rounded-md bg-gray-800 dark:bg-gray-700 flex items-center justify-center">
                                        <span class="text-white font-medium text-xs">MS</span>
                                    </div>
                                    <div class="ml-3">
                                        <h1 class="text-sm font-medium text-gray-900 dark:text-white">Mohammad Samgan</h1>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">Web Developer</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Sidebar content -->
                            <div class="flex-1 p-4">
                                <livewire:sidebar />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
