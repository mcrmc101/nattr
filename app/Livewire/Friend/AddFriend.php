<?php

namespace App\Livewire\Friend;

use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class AddFriend extends Component
{

    use WithPagination;
    public function addFriend($id)
    {
        auth()->user()->addFriend($id);
        $this->dispatch('updateFriends');
    }

    #[Layout('layouts.app')]
    #[On('updateFriends')]
    public function render()
    {
        return view('livewire.friend.add-friend', [
            'users' => User::where('id', '!=', auth()->user()->id)
                ->whereNotIn('id', auth()->user()->friends->pluck('id')->toArray())
                ->select('name', 'id', 'profile_photo_url')->simplePaginate(20, pageName: 'list-users')
        ]);
    }
}
