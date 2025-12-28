<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\Message;
use App\Events\MessageSent;


class MessageController extends Controller
{
    //

    public function sendMessage(Request $request)
    {
        $message = Message::create([
            'chat_id'   => $request->chat_id,
            'sender_id' => auth()->id(),
            'message'   => $request->message,
        ]);

        broadcast(new MessageSent($message))->toOthers();

        return response()->json($message);
    }
}
