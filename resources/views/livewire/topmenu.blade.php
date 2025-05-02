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

<header class="p-4 dark:bg-gray-100 dark:text-gray-800">
    <div class="container mx-auto flex h-16 justify-between md:space-x-8">
        <img src="{{ $data['intro']['img'] }}" class="h-8 w-8 rounded-full" alt="{{ $data['name'] }}" />
        <ul class="hidden items-stretch space-x-3 md:flex">
            @foreach ($data['navigation']['pages'] as $page)
                <li class="flex">
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
                </li>
            @endforeach
        </ul>
    </div>
</header>
