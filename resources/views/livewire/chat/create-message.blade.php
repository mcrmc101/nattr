<div>
    <form wire:submit="create">
        {{ $this->form }}

        <x-filament::button type="submit">Send</x-filament::button>

    </form>

    <x-filament-actions::modals />
</div>
