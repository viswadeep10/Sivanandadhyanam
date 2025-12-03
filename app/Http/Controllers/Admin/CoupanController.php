<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Coupan;


use Illuminate\Http\Request;

class CoupanController extends Controller
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
        
      	$data = Coupan::orderBy('id','DESC')->paginate(10);
        return view('admin.coupan.index',compact('data'))
        ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('admin.coupan.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'title' => 'required|unique:coupans',
            'discount' => 'required',
            'email' => 'required|email|unique:coupans',
        ]);
        $input = $request->all();
        $input['status'] = isset($input['status']) ? 1 : 0 ;
        $user = Coupan::create($input);
        return redirect()->route('coupan.index')
        ->with('success','Coupan created successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('Coupan::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $coupan = Coupan::find($id);
        return view('admin.coupan.edit',compact('coupan'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'title' => 'required|unique:coupans,id,'.$id,
            'discount' => 'required',
            'email' => 'required|email|unique:coupans,id,'.$id,
        ]);
        $coupan = Coupan::find($id);
        $input = $request->all();
        $input['status'] = isset($input['status']) ? 1 : 0 ;
        $coupan->update($input);
        return redirect()->route('coupan.index')
        ->with('success','Coupan update successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
        $coupan = Coupan::find($id);

        if($coupan)
        {
            $coupan->delete();
            return redirect()->route('Coupan.index')->with('success','Coupan deleted successfully');
        }
    }
}
