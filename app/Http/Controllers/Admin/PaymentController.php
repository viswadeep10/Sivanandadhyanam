<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Payment;


use Illuminate\Http\Request;

class PaymentController extends Controller
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
    public function index(Request $request)
    {
        
      	$data = Payment::with('coupan')->orderBy('created_at','DESC')->paginate(50);
        return view('admin.payment.index',compact('data'))
        ->with('i', ($request->input('page', 1) - 1) * 50);
    }

    public function show(Request $request,$id)
    {
       
            $data = Payment::with('coupan')->where('coupan_id',$id)->orderBy('created_at','DESC')->paginate(50);
        return view('admin.payment.show',compact('data'))
        ->with('i', ($request->input('page', 1) - 1) * 50);
    }
}
