<?php

use App\Service;
use Livewire\Volt\Component;

new class extends Component
{
    public $post;

    public function mount(): void
    {
        $this->post = Service::getPost(request()->route('post'));
    }
}; ?>

<div>
    <article class="space-y-8 text-gray-900 post">
        @if ($post['featured_image'])
            <img src="{{ $post['featured_image'] }}" alt="{{ $post['title'] }}" class="w-full max-h-96"/>
        @endif

        <h1 class="text-4xl leading-7 text-gray-700 md:text-4xl md:tracking-tight dark:text-white">
            {{ Str::title($post['title']) }}
        </h1>

        <div class="flex flex-col items-start justify-between w-full text-gray-600 md:flex-row md:items-center">
            <div class="flex items-center md:space-x-2">
                <img
                    src="https://secure.gravatar.com/avatar/c2acbea3e046c1b8cf7358d8526eda63?s=80"
                    alt=""
                    class="w-4 h-4 bg-gray-500 border border-gray-300 rounded-full"
                />
                <span class="text-sm  dark:text-white">
                    msamgan • {{ dateFormat($post['published_at']) }}
                </span>
            </div>
        </div>

        <div class="font-light leading-7 text-gray-800  dark:text-white">
            <div class="post-content">
                {!! $post['content'] !!}
            </div>
        </div>
    </article>
</div>
