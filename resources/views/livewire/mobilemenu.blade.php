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
    <!-- Modern hamburger menu button -->
    <button
        class="group fixed right-4 top-4 z-50 flex h-10 w-10 items-center justify-center rounded-full bg-white shadow-lg transition-all duration-300 hover:bg-red-600 md:hidden dark:bg-gray-800 dark:hover:bg-red-600"
        wire:click="toggleMenu"
        aria-label="Toggle menu"
    >
        <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="size-5 text-gray-700 transition-colors duration-300 group-hover:text-white dark:text-gray-300"
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
        <!-- Backdrop with blur effect -->
        <div class="fixed inset-0 bg-gray-900/60 backdrop-blur-sm transition-opacity" aria-hidden="true"></div>

        <div class="fixed inset-0 overflow-hidden">
            <div class="absolute inset-0 overflow-hidden">
                <div
                    class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10"
                    x-transition:enter="transform transition duration-500 ease-in-out"
                    x-transition:enter-start="translate-x-full"
                    x-transition:enter-end="translate-x-0"
                    x-transition:leave="transform transition duration-500 ease-in-out"
                    x-transition:leave-start="translate-x-0"
                    x-transition:leave-end="translate-x-full"
                >
                    <div class="pointer-events-auto relative w-screen max-w-md">
                        <!-- Close button with improved styling -->
                        <div class="absolute left-0 top-0 -ml-12 flex pr-2 pt-4">
                            <button
                                type="button"
                                wire:click="toggleMenu"
                                class="group relative flex h-10 w-10 items-center justify-center rounded-full bg-white shadow-lg transition-all duration-300 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 dark:bg-gray-800 dark:hover:bg-red-600"
                            >
                                <span class="sr-only">Close panel</span>
                                <svg
                                    class="size-5 text-gray-700 transition-colors duration-300 group-hover:text-white dark:text-gray-300"
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

                        <!-- Panel content with improved styling -->
                        <div class="flex h-full flex-col overflow-y-auto bg-white p-6 shadow-2xl dark:bg-gray-800">
                            <!-- Mobile header with logo -->
                            <div class="mb-6 flex items-center justify-between border-b border-gray-200 pb-4 dark:border-gray-700">
                                <div class="flex items-center space-x-3">
                                    <div class="relative h-10 w-10 overflow-hidden rounded-full bg-gradient-to-br from-red-500 to-red-600 p-0.5 shadow-lg">
                                        <div class="absolute inset-0 rounded-full bg-white dark:bg-gray-800"></div>
                                        <div class="relative flex h-full w-full items-center justify-center rounded-full bg-white text-lg font-bold text-red-600 dark:bg-gray-800 dark:text-red-400">
                                            MS
                                        </div>
                                    </div>
                                    <span class="text-lg font-semibold text-gray-900 dark:text-white">msamgan.com</span>
                                </div>
                            </div>

                            <!-- Sidebar content -->
                            <div class="relative flex-1 animate-fadeIn">
                                <livewire:sidebar />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
