<?php

use App\Livewire\Chat\CreateChat;
use App\Livewire\Chat\ShowChat;
use App\Livewire\Friend\AddFriend;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::middleware('auth')->prefix('chat')->group(function ($router) {
    $router->get('/create', CreateChat::class)->name('chat.create');
    $router->get('/{chatId}', ShowChat::class)->name('chat.show');
});

Route::middleware('auth')->prefix('friends')->group(function ($router) {
    $router->get('/add-friend', AddFriend::class)->name('friend.add');
});
