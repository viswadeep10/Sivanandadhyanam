<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Models\Meditation;

use DB;



use Illuminate\Http\Request;

class PageController extends Controller
{
    
    public function index()
    {
        $meditaions = Meditation::where('status',1)->orderBy('position','ASC')->get();

        return view('front.index',compact('meditaions'));
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
