<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Attributes\Session;
use App\Livewire\Partials\AlertBanner;
use App\Models\Message;
use App\Services\WebPushService;
use Livewire\Component;

class ShowNotification extends Component
{
    public $showNotification = false;

    public $chatIds;

    public $userId;

    public function mount()
    {
        $this->userId = auth()->user()->id;
    }

    public function getListeners()
    {
        return [
            "echo-private:messages.{$this->userId},MessageCreated" => 'toggleNotification',
        ];
    }

    public function toggleNotification($event)
    {
        $message = Message::find($event['message']['id']);
        $title = 'New Message';
        $body = 'New Message from ' . $message->user->name;
        foreach ($message->chat->users as $user) {
            WebPushService::sendNotification($user->id, $title, $body);
        }

        $this->showNotification = true;
    }

    public function render()
    {
        return view('livewire.show-notification');
    }
}
