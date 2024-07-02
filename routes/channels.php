<?php

use App\Models\User;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return $user->id === $id;
});


Broadcast::channel('messages.{id}', function ($user, $id) {
    return $user->id === $id;
});
