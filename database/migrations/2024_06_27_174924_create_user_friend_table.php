<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_friend', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignUuid('user_id');
            $table->foreignUuid('friend_id');
            $table->boolean('mute')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_friend');
    }
};
