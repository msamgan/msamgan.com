<x-layouts.app>
    <x-slot name="head">
        @include('meta.welcome')
    </x-slot>

    <div class="space-y-12">
        <livewire:introduction />
        {{--<x-fx-banner />--}}
    </div>
</x-layouts.app>
