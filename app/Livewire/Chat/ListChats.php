<?php

namespace App\Livewire\Chat;

use App\Models\Chat;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

class ListChats extends Component
{
    use WithPagination;

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.chat.list-chats', [
            'chats' => Chat::with('users')->whereHas('users', function ($query) {
                $query->where('user_id', auth()->user()->id);
            })->latest()->simplePaginate(12)
        ]);
    }
}
