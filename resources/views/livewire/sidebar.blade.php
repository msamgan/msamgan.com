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

<div class="">
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
                    'active' => request()->is($page['link']),
                ]
            )
        @endif
    @endforeach

    <hr class="mb-4 mt-4" />
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
