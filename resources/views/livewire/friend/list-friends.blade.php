<div>
    <ul class="flex gap-4 flex-wrap mb-6">
        @forelse ($friends as $friend)
            <li class="flex flex-col gap-4 cursor-pointer shadow hover:shadow-xl p-4 items-center"
                wire:key="list-friends-friend-list-{{ $friend['id'] }}">
                <img src="{{ $friend['profile_photo_url'] }}" alt="{{ $friend['name'] }} profile photo"
                    class="h-16 w-16 mx-auto rounded">
                <p class="font-bold text-lg">{{ $friend['name'] }}</p>
                <button class="btn btn-primary" wire:click.prevent="removeFriend('{{ $friend['id'] }}')">Message</button>
                <button class="btn btn-sm btn-error float-end"
                    wire:click.prevent="removeFriend('{{ $friend['id'] }}')">remove</button>
            </li>
        @empty
        @endforelse
    </ul>
    {{ $friends->links() }}
</div>
