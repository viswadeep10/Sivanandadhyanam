<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Contact;


use Illuminate\Http\Request;

class EnquiryController extends Controller
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
        
      	$data = Contact::orderBy('created_at','DESC')->paginate(50);
        return view('admin.enquiry.index',compact('data'))
        ->with('i', ($request->input('page', 1) - 1) * 50);
    }

  public function show($id)
  {
     $enq = Contact::find($id);
     $enq->status = 1;
     $enq->save();
             return redirect()->route('enquiry.index')
        ->with('success','Status updated successfully');

  }
    
}
