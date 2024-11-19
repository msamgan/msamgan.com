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
    <div class="grid grid-cols-2 gap-4 md:grid-cols-2">
        @foreach ($data['projects'] as $project)
            <div class="rounded-md bg-gray-50">
                <img
                    src="{{ $project['img'] }}"
                    alt="{{ $project['name'] }}"
                    class="block h-64 w-full rounded-md object-cover object-center"
                />
                <div class="space-y-3 p-4">
                    <a rel="noopener noreferrer" href="#" class="block">
                        <h3 class="text-lg font-semibold text-gray-900">{{ Str::title($project['name']) }}</h3>
                    </a>
                    <p class="font-light leading-7 text-gray-700">{{ $project['description'] }}</p>
                </div>

                <div class="flex items-center justify-between p-4">
                    <a target="_blank" href="{{ $project['link'] }}" class="text-red-500 hover:text-red-700">
                        View Project
                    </a>
                    <a target="_blank" href="{{ $project['repo'] }}" class="text-red-500 hover:text-red-700">
                        View Source
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
