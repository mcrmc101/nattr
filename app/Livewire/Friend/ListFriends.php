<?php

namespace App\Livewire\Friend;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class ListFriends extends Component
{
    use WithPagination;

    public function removeFriend($id)
    {
        auth()->user()->removeFriend($id);
        $this->dispatch('updateFriends');
    }

    #[On('updateFriends')]
    public function render()
    {
        return view('livewire.friend.list-friends', [
            //'friends' => auth()->user()->friends->select('name', 'id', 'profile_photo_url'),
            'friends' => User::whereIn('id', auth()->user()->friends->pluck('id')->toArray())
                ->select('name', 'id', 'profile_photo_url')->simplePaginate(20, pageName: 'list-friends')
        ]);
    }
}
