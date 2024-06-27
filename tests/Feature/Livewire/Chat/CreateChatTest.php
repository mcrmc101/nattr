<?php

namespace Tests\Feature\Livewire\Chat;

use App\Livewire\Chat\CreateChat;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class CreateChatTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(CreateChat::class)
            ->assertStatus(200);
    }
}
