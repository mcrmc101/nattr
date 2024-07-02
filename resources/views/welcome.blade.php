<x-guest-layout>
    <div class="flex h-screen items-center justify-center">
        @include('icons.logo', [
            'height' => 150,
            'width' => 150,
        ])
        <h1 class="sr-only">{{ config('app.name') }}</h1>
    </div>
</x-guest-layout>
