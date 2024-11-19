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
    <section class="space-y-4 rounded-md bg-gray-100 p-6 text-gray-900">
        <h1 class="text-3xl font-bold">{{ Str::title('Get In Touch') }}</h1>
        <div class="space-y-4 pb-4 pt-4">
            <p class="flex items-center">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                    class="mr-2 h-5 w-5 sm:mr-6"
                >
                    <path
                        fill-rule="evenodd"
                        d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                        clip-rule="evenodd"
                    ></path>
                </svg>
                <span class="font-light">{{ $data['contact']['address'] }}</span>
            </p>
            {{--
                <p class="flex items-center">
                <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20"
                fill="currentColor"
                class="w-5 h-5 mr-2 sm:mr-6"
                >
                <path
                d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"></path>
                </svg>
                <span>{{ $data['contact']['phone'] }}</span>
                </p>
            --}}
            <p class="flex items-center">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                    class="mr-2 h-5 w-5 sm:mr-6"
                >
                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                </svg>
                <span class="font-light">{{ $data['contact']['email'] }}</span>
            </p>
        </div>
    </section>
</div>
