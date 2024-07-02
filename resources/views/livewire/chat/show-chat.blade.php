<div>
    <x-filament::section class="overflow-y-scroll flex flex-col-reverse mb-4" style="height: 50vh">
        @if ($chat)
            @forelse ($chat->messages as $message)
                <div class="chat @if ($message->user_id == auth()->user()->id) chat-end @else chat-start @endif">
                    <div class="chat-image avatar">
                        <div class="w-10 rounded-full">
                            <img alt="{{ $message->user->name }} profile photo"
                                src="{{ $message->user->profile_photo_url }}" />
                        </div>
                    </div>
                    <div class="chat-header">
                        {{ $message->user->name }}
                        <time class="text-xs opacity-50">{{ $message->created_at }}</time>
                    </div>
                    <div class="chat-bubble">
                        @if ($message->getFirstMediaUrl())
                            <img src="{{ $message->getFirstMediaUrl() }}" alt="{{ $message->user->name }} message image"
                                class="h-96">
                        @endif
                        {!! $message->content !!}
                    </div>
                    <div class="chat-footer opacity-50">Delivered</div>
                </div>
            @empty
            @endforelse
        @endif
    </x-filament::section>
    <x-filament::section>
        @livewire('chat.create-message', [
            'chatId' => $chat->id,
        ])
    </x-filament::section>
</div>
