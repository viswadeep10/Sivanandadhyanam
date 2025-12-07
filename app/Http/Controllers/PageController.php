<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use DB;


use Illuminate\Http\Request;

class PageController extends Controller
{
    
    public function index()
    {
        return view('front.index');
    }
    
}
