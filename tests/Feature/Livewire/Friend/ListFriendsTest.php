<?php

namespace Tests\Feature\Livewire\Friend;

use App\Livewire\Friend\ListFriends;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class ListFriendsTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(ListFriends::class)
            ->assertStatus(200);
    }
}
