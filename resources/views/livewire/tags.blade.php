<?php

use App\Service;
use Livewire\Volt\Component;

new class extends Component
{
    public array $tags = [];

    public function mount(): void
    {
        $this->tags = Service::getTagList();
    }
}; ?>

<div>
    @foreach ($tags as $tag)
        <span
            class="inline-block text-sm font-light text-gray-600 bg-white rounded-full"
            style="font-size: {{ $tag['posts_count'] * 1.2 + 18 }}px; padding: {{ $tag['posts_count'] * 0.5 + 10 }}px"
        >
            <a {{--href={"/tag/" + tag.slug}--}} class={"hover:text-red-600"}>
                {{ $tag['name'] }} ({{ $tag['posts_count'] }})
            </a>
        </span>
    @endforeach
</div>
