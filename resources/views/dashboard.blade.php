<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <x-filament::section class="mb-6">
        @include('partials.user-stats')
    </x-filament::section>
    <x-filament::section class="mb-6">
        @livewire('chat.list-chats')
    </x-filament::section>
</x-app-layout>
