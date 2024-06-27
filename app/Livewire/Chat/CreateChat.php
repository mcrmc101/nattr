<?php

namespace App\Livewire\Chat;

use App\Models\Chat;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;

class CreateChat extends Component
{

    public $users;
    public $selectedUserIds = [];

    public function mount()
    {
        $this->users = User::where('id', '!=', auth()->user()->id)->get();
    }

    public function selectUser($userId)
    {
        $user = User::find($userId);
        if (!in_array($userId, $this->selectedUserIds)) {
            array_push($this->selectedUserIds, $user->id);
        }
    }

    public function startChat()
    {
        $chat = Chat::create();
        $chat->users()->attach($this->selectedUserIds);
        $this->redirectRoute('chat.show', $chat->id);
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.chat.create-chat');
    }
}
