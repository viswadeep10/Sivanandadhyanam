<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\ServicePayment;
Use DB;


use Illuminate\Http\Request;

class SettingController extends Controller
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
    public function setting(Request $request)
    {
            if ($request->isMethod('POST')) {
            DB::table('settings')
    ->where('id', 1)
    ->update(['marquee' => $request->marquee]);
return redirect()->route('setting')
        ->with('success','Update successfully');
            }

        $setting = DB::table('settings')->where('id',1)->first();
        return view('admin.setting.create',compact('setting'));
    }

    
}
