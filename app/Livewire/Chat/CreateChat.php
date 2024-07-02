<?php

namespace App\Livewire\Chat;

use App\Models\Chat;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

class CreateChat extends Component
{

    public $users;
    public $selectedUserIds = [];

    public function mount()
    {
        $this->users = auth()->user()->friends;
    }

    public function selectUser($userId)
    {
        $user = User::find($userId);
        if (!in_array($userId, $this->selectedUserIds)) {
            array_push($this->selectedUserIds, $user->id);
        }
    }

    #[On('createChat')]
    public function chatCreated($id)
    {
        $chat = Chat::find($id);
        array_push($this->selectedUserIds, auth()->user()->id);
        $chat->users()->attach($this->selectedUserIds);
        $this->redirectRoute('chat.show', $chat->id);
    }

    /*
    public function startChat()
    {
        array_push($this->selectedUserIds, auth()->user()->id);
        // $chat = Chat::create();
        // $chat->users()->attach($this->selectedUserIds);
        $this->redirectRoute('chat.show', [null, json_encode($this->selectedUserIds)]);
    }
        */

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.chat.create-chat');
    }
}
