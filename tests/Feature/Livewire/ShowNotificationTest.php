<?php

namespace Tests\Feature\Livewire;

use App\Livewire\ShowNotification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ShowNotificationTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(ShowNotification::class)
            ->assertStatus(200);
    }
}
