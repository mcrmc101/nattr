<?php

namespace App\Services;

use App\Models\PushSubscription;
use Minishlink\WebPush\WebPush;
use Minishlink\WebPush\Subscription;

class WebPushService
{
    public static function sendNotification($userId, $title, $body)
    {
        $subscription = PushSubscription::where('user_id', $userId)->first();

        $webPush = new WebPush([
            'VAPID' => [
                'subject' => 'nattR',
                'publicKey' => config('app.vapid.public'),
                'privateKey' => config('app.vapid.private'),
            ],
        ]);

        $report = $webPush->sendOneNotification(
            Subscription::create([
                'endpoint' => $subscription->endpoint,
                'publicKey' => $subscription->public_key,
                'authToken' => $subscription->auth_token,
            ]),
            json_encode(['title' => $title, 'body' => $body])
        );
    }
}
