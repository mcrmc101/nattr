<?php

namespace App\Livewire\Chat;

use App\Models\Chat;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ShowChat extends Component
{

    public $chat;

    public function mount($chatId)
    {
        $this->chat = Chat::find($chatId);
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.chat.show-chat');
    }
}
