<?php

use App\Models\Chat;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('chat.{chatId}', function ($user, $chatId) {
        if ($user->hasRole('admin')) {
        return true;
    }

    return Chat::where('id', $chatId)
        ->where('user_id', $user->id)
        ->exists();
});
