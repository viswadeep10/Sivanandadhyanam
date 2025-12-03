<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Complaint;


use Illuminate\Http\Request;

class ComplainController extends Controller
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
        
      	$data = Complaint::orderBy('created_at','DESC')->paginate(50);
        return view('admin.complain.index',compact('data'))
        ->with('i', ($request->input('page', 1) - 1) * 50);
    }

public function show($id)
  {
     $enq = Complaint::find($id);
     $enq->status = 1;
     $enq->save();
             return redirect()->route('complain.index')
        ->with('success','Status updated successfully');

  }
    
}
