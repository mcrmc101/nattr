<div>
    <x-filament::section class="mb-4">
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
                <div class="chat-bubble">{!! $message->content !!}</div>
                <div class="chat-footer opacity-50">Delivered</div>
            </div>
        @empty
        @endforelse
    </x-filament::section>
    <x-filament::section>
        @livewire('chat.create-message', [
            'chatId' => $chat->id,
        ])
    </x-filament::section>
</div>
