<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Models\Meditation;
use App\Models\Chat;
use App\Models\Schedule;
use DB;



use Illuminate\Http\Request;

class PageController extends Controller
{
    
    public function index()
    {
        
        $meditaions = Meditation::where('status',1)->orderBy('position','ASC')->get();
        $schedules = Schedule::where('status',1)->orderBy('start_time','ASC')->get();
        $chat= NULL;
        $messages= NULL;

        if(auth()->id()) {
        $chat = Chat::firstOrCreate([
        'user_id' => auth()->id()
    ]);

    $messages = $chat->messages()->get();
   }

        return view('front.index',compact('meditaions','chat','messages','schedules'));
    }
    public function about()
    {
        return view('front.about');
    }
    public function gurujiKshetrams()
    {
        return view('front.guruji-kshetrams');
    }
    public function dhyasa()
    {
        return view('front.dhyasa');
    }
    
}
