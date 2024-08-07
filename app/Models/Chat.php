<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory,
        HasUuids;

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_chat');
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function getParticipants()
    {
        return implode(', ', $this->users->pluck('name')->toArray());
    }
}
