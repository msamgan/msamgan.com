<x-layouts.app>
    <x-slot name="head">
        <title>{{ titleGenerator('Tags') }}</title>
        <meta name="description" content="Tags list for msamgan.com blog" />
        <meta name="keywords" content="msamgan, blog, technical blog, programming, code, tags" />
        <meta property="og:title" content="{{ titleGenerator('Tags') }}" />
        <meta property="og:description" content="Tags list for msamgan.com blog" />
        <meta property="og:image" content="{{ getDefaultImageUrl() }}" />
    </x-slot>

    <livewire:tags />
</x-layouts.app>
