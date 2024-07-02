<div>
    <form wire:submit="create">
        {{ $this->form }}

        <button type="submit" class="btn btn-primary w-full my-6">Send</button>

    </form>

    <x-filament-actions::modals />
</div>
