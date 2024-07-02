<?php

namespace Tests\Feature\Livewire\Partials;

use App\Livewire\Partials\PushNotificationSubscription;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class PushNotificationSubscriptionTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(PushNotificationSubscription::class)
            ->assertStatus(200);
    }
}
