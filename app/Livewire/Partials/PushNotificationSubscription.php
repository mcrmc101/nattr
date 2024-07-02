<?php

namespace App\Livewire\Partials;

use Livewire\Component;
use App\Models\PushSubscription;

class PushNotificationSubscription extends Component
{

    public $vapidPublicKey;

    public function mount()
    {
        $this->vapidPublicKey = $this->urlBase64ToUint8Array(config('services.vapid.public_key'));
    }

    private function urlBase64ToUint8Array($base64String)
    {
        $padding = str_repeat('=', 4 - (strlen($base64String) % 4));
        $base64 = strtr($base64String, '-_', '+/') . $padding;
        $rawData = base64_decode($base64);
        $outputArray = array();
        for ($i = 0; $i < strlen($rawData); ++$i) {
            $outputArray[] = ord($rawData[$i]);
        }
        return json_encode($outputArray);
    }

    public function subscribe($endpoint, $key, $token)
    {
        PushSubscription::updateOrCreate(
            ['endpoint' => $endpoint],
            [
                'user_id' => auth()->user()->id(),
                'public_key' => $key,
                'auth_token' => $token,
            ]
        );

        $this->emit('subscriptionSaved');
    }


    public function render()
    {
        return view('livewire.partials.push-notification-subscription');
    }
}
