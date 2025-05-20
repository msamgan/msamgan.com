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

<div class="sticky left-0 right-0 top-6 animate-fadeIn">
    <!-- Logo/Brand -->
    <div class="mb-6 flex items-center justify-center">
        <div class="relative h-12 w-12 overflow-hidden rounded-full bg-gradient-to-br from-red-500 to-red-600 p-0.5 shadow-lg">
            <div class="absolute inset-0 rounded-full bg-white dark:bg-gray-800"></div>
            <div class="relative flex h-full w-full items-center justify-center rounded-full bg-white text-xl font-bold text-red-600 dark:bg-gray-800 dark:text-red-400">
                MS
            </div>
        </div>
    </div>

    <!-- Navigation Section -->
    <div class="mb-6">
        <h3 class="mb-3 px-4 text-xs font-semibold uppercase tracking-wider text-gray-900 dark:text-gray-400">
            Navigation
        </h3>
        <div class="space-y-1">
            @foreach ($data['navigation']['pages'] as $page)
                @if ($page['external'])
                    @include(
                        'components.external-link',
                        [
                            'link' => url($page['link']),
                            'label' => $page['name'],
                        ]
                    )
                @else
                    @include(
                        'components.internal-link',
                        [
                            'link' => url($page['link']),
                            'label' => $page['name'],
                            'active' =>
                                request()->is($page['link']) ||
                                activateLink('posts.show', 'posts', $page) ||
                                activateLink('docs', 'projects', $page),
                        ]
                    )
                @endif
            @endforeach
        </div>
    </div>

    <!-- Social Section -->
    <div class="mb-6">
        <h3 class="mb-3 px-4 text-xs font-semibold uppercase tracking-wider text-gray-900 dark:text-gray-400">
            Connect
        </h3>
        <div class="space-y-1">
            @foreach ($data['navigation']['social'] as $social)
                @include(
                    'components.external-link',
                    [
                        'link' => $social['link'],
                        'label' => $social['name'],
                    ]
                )
            @endforeach
        </div>
    </div>

    <!-- Sponsor Button -->
    {{--<div class="mb-6 px-4">
        <h3 class="mb-3 text-xs font-semibold uppercase tracking-wider text-gray-900 dark:text-gray-400">
            Support
        </h3>
        <div class="hover-lift transition-transform duration-300">
            <iframe
                src="https://github.com/sponsors/msamgan/button"
                title="Sponsor msamgan"
                height="32"
                width="114"
                style="border: 0; border-radius: 6px"
            ></iframe>
        </div>
    </div>--}}

    <!-- Theme Toggle -->
    {{--<div class="rounded-lg bg-gray-100 p-4 dark:bg-gray-800">
        <div class="flex items-center justify-between">
            <span class="text-sm font-medium text-gray-700 dark:text-gray-300">Toggle Theme</span>
            <button
                id="theme-toggle"
                type="button"
                class="hover-lift flex h-8 w-8 items-center justify-center rounded-full bg-white shadow-sm text-gray-500 transition-all duration-300 hover:bg-red-600 hover:text-white focus:outline-none focus:ring-2 focus:ring-red-500 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-red-500"
            >
                <svg
                    id="theme-toggle-dark-icon"
                    class="hidden h-4 w-4"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                </svg>
                <svg
                    id="theme-toggle-light-icon"
                    class="hidden h-4 w-4"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                        fill-rule="evenodd"
                        clip-rule="evenodd"
                    ></path>
                </svg>
            </button>
        </div>
    </div>--}}
</div>
