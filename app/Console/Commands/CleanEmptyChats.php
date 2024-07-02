<?php

namespace App\Console\Commands;

use App\Models\Chat;
use Illuminate\Console\Command;

class CleanEmptyChats extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'chat:clean-empty-chats';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $chats = Chat::doesntHave('messages')->whereDate('created_at', '<=', now()->subDays(1)->setTime(0, 0, 0)->toDateTimeString())->get();
        foreach ($chats as $chat) {
            $chat->delete();
        }
    }
}
