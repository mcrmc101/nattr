<?php

namespace Tests\Feature\Livewire\Friend;

use App\Livewire\Friend\AddFriend;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class AddFriendTest extends TestCase
{
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(AddFriend::class)
            ->assertStatus(200);
    }
}
