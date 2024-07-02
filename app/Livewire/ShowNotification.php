<?php

namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Attributes\Session;
use App\Livewire\Partials\AlertBanner;
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
        //  dd($event);
        $this->showNotification = true;
    }

    public function render()
    {
        return view('livewire.show-notification');
    }
}