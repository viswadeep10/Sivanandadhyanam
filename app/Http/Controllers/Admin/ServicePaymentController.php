<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\ServicePayment;


use Illuminate\Http\Request;

class ServicePaymentController extends Controller
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
        
      	$data = ServicePayment::with('services')->orderBy('created_at','DESC')->paginate(50);
        return view('admin.service-payment.index',compact('data'))
        ->with('i', ($request->input('page', 1) - 1) * 50);
    }

      public function show($id)
  {
     $enq = ServicePayment::find($id);
     $enq->is_active = 1;
     $enq->save();
             return redirect()->route('service-payment.index')
        ->with('success','Status updated successfully');

  }
}
