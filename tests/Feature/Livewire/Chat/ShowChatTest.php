<?php

namespace Tests\Feature\Livewire\Chat;

use App\Livewire\Chat\ShowChat;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ShowChatTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(ShowChat::class)
            ->assertStatus(200);
    }
}
