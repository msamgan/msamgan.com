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

<div class="sticky left-0 right-0 top-6">
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
                        (request()
                            ->route()
                            ->getName() === 'posts.show' &&
                            $page['link'] === 'posts'),
                ]
            )
        @endif
    @endforeach
    <hr class="mb-8 mt-4" />
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
