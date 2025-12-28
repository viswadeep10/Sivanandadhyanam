<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Chat;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
           $chats = Chat::with(['user', 'messages'])
           ->whereHas('user')
           ->whereHas('messages')
           ->latest()->get();
            return view('admin.home',compact('chats'));
    }

    public function messageHistory(Request $request)
    {
        $chat = Chat::find($request->chat_id);
        return $chat->messages->map(function ($msg) {
            return [
                'message' => $msg->message,
                'sender_role' => $msg->sender->getRoleNames()->first(),
            ];
        });
    }
}
