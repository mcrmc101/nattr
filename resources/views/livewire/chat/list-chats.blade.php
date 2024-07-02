    <div class="flex flex-col md:flex-row">
        @forelse ($chats as $chat)
            <div class="bg-base-100 shadow hover:shadow-xl m-2">
                <a href="{{ route('chat.show', $chat->id) }}">
                    <div class="card-body">
                        <h2 class="card-title">{{ $chat->getParticipants() }}</h2>
                        <p>{{ $chat->messages->count() }} messages</p>
                        <p>{{ $chat->created_at->format('D M Y H:i') }}</p>
                    </div>
                </a>
            </div>

        @empty
        @endforelse
        <div class="col-span-4 my-6">
            {{ $chats->links() }}
        </div>
    </div>
