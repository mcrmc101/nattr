<?php

namespace Tests\Feature\Livewire\Chat;

use App\Livewire\Chat\ListChats;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ListChatsTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(ListChats::class)
            ->assertStatus(200);
    }
}
