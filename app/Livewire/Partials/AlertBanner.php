<?php

namespace App\Livewire\Partials;

use Livewire\Attributes\On;
use Livewire\Attributes\Session;
use Livewire\Component;

class AlertBanner extends Component
{
    #[Session]
    public $status;
    #[Session]
    public $statusMessage;

    #[On('alertBanner')]
    public function fire($data)
    {
        //  dd($data['status']);
        $this->status = $data['status'];
        $this->statusMessage = $data['statusMessage'];
        $this->dispatch('showMessage');
    }

    public function render()
    {
        return view('livewire.partials.alert-banner');
    }
}
