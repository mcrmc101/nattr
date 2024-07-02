<div>
    @if (auth()->user()->friends->count() > 0)
        <x-filament::section class="mb-6">
            <x-slot name="heading">
                My Friends:
            </x-slot>
            @livewire('friend.list-friends')
        </x-filament::section>
    @endif
    <x-filament::section class="mb-6">
        <x-slot name="heading">
            Find Friends:
        </x-slot>
        <ul class="flex gap-4 flex-wrap mb-6">
            @forelse ($users as $user)
                <li class="flex flex-col gap-4 cursor-pointer shadow hover:shadow-xl p-4"
                    wire:key="add-friend-user-list-{{ $user['id'] }}">
                    <img src="{{ $user['profile_photo_url'] }}" alt="{{ $user['name'] }} profile photo"
                        class="h-16 w-16 mx-auto rounded">
                    <p class="font-bold text-lg">{{ $user['name'] }}</p>
                    <button class="btn" wire:click.prevent="addFriend('{{ $user['id'] }}')">Add</button>
                </li>
            @empty
            @endforelse
        </ul>
        {{ $users->links() }}
    </x-filament::section>
</div>
