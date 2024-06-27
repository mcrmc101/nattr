<x-filament::section>
    <x-slot name="heading">
        Select Users
    </x-slot>
    <div class="grid grid-cols-1 md:grid-cols-3">
        <ul class="col-span-2">
            @foreach ($users as $user)
                <li class="flex flex-row gap-4 mb-4" wire:key="select-users-for-chat-{{ $user->id }}">
                    <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }} profile photo">
                    <button wire:click.prevent="selectUser('{{ $user->id }}')"
                        class="btn">{{ $user->name }}</button>
                </li>
            @endforeach
        </ul>
        <div>
            <ul>
                @foreach ($users as $user)
                    @if (in_array($user->id, $selectedUserIds))
                        <li>{{ $user->name }}</li>
                    @endif
                @endforeach
            </ul>
        </div>

        @if ($selectedUserIds)
            <div class="my-4">
                <button wire:click="startChat" class="btn">Start Chat</button>
            </div>
        @endif

    </div>
</x-filament::section>
