<x-layouts.app>
    <x-slot name="head">
        @include('meta.posts')
    </x-slot>

    <x-slot name="canonical">
        @php
            $page = request()->get('page');
            $canonical = $page ? url('/posts?page=' . $page) : url('/posts');
        @endphp

        <link rel="canonical" href="{{ $canonical }}" />
    </x-slot>

    <livewire:posts />
</x-layouts.app>
