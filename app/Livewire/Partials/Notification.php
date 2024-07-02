<?php

namespace App\Livewire\Partials;

use App\Models\Post;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;
use Livewire\Component;

class Notification extends Component
{
    public Post $post;
    public $message = 'notification';

    public function getListeners()
    {
        return [
            "echo:posts,PostCreated" => 'postNotification',
        ];
    }
    public function postNotification()
    {
        Log::debug('ping');
        dd('ping');
        $this->message = 'ping';
    }

    public function render()
    {
        return view('livewire.partials.notification');
    }
}
